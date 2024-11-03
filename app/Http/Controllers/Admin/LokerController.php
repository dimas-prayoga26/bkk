<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dudi;
use App\Models\User;
use App\Models\Loker;
use App\Helpers\IdtHelper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\LokerNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class LokerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $loker = Auth::user()->isAdminDudi()
            ? Loker::where('dudi_id', Auth::user()->admin->dudi_id)
            : Loker::query();

    if ($request->info) $loker->where('info', $request->info);
    if ($request->dudi_id) $loker->where('dudi_id', $request->dudi_id);
    if ($request->status) $loker->where('status', $request->status);

    if ($request->ajax()) {
      return DataTables::of($loker->with(['admin.user:id,name', 'dudi'])->orderBy('tanggal_diunggah', 'desc'))->addIndexColumn()
        ->editColumn('dudi.name', fn($data) => $data->dudi->name)
        ->editColumn('judul', fn($data) => Str::limit($data->judul, 50, '...'))
        ->editColumn('admin.name', fn($data) => $data->admin->user->name)
        ->editColumn('tanggal_diunggah', fn($data) => date("d-m-Y", strtotime($data->tanggal_diunggah)))
        ->editColumn('status', function($data){
          return ($data->status == 'buka')
            ? '<span class="badge badge-sm badge-success">DIBUKA</span>'
            : '<span class="badge badge-sm badge-danger">DITUTUP</span>';
        })
        ->editColumn('info', function($data){
          return ($data->info == 'internal')
            ? '<span class="badge badge-sm badge-light-primary">INTERNAL</span>'
            : '<span class="badge badge-sm badge-light-warning">EKSTERNAL</span>';
        })
        ->addColumn('aksi', fn($data) => view('pages.manage.loker.aksi', ['data' => $data]))
        ->rawColumns(['status','info'])
        ->make(true);
    }
    return view('pages.manage.loker.index',[
      'loker' => $loker,
      'dudi' => Dudi::get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $dudi = Auth::user()->isAdminDudi()
            ? Dudi::where('id', Auth::user()->admin->dudi_id)->notdelete()->get()
            : Dudi::notdelete()->get();
      return view('pages.manage.loker.create',[
        'dudi' => $dudi,
        'kual_pend' => [ 'sd' => 'SD/MI/Sederajat', 'smp' => 'SMP/MTs/Sederajat', 'sma' => 'SMA/SMK/Sederajat', 'd3' => 'Diploma III', 's1' => 'Sarjana I', ],
      ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      Log::info('Store function started'); 
  
      $request->validate([
          'dudi_id' => 'required|exists:dudis,id',
          'status' => 'required',
          'tanggal_diunggah' => 'required|date',
          'tanggal_batas' => 'required|date',
          'kual_pend' => 'required',
          'kual_jurusan' => 'required',
          'judul' => 'required',
          'posisi' => 'required',
          'isi' => 'required',
          'info' => 'required',
          'cover_loker' => 'required|image',
      ]);
  
      try {
          DB::beginTransaction();
          Log::info('Validasi input berhasil'); // Logging validasi berhasil
  
          // Proses penyimpanan gambar cover
          if (filled($request->cover_loker)) {
              $cover = $request->file('cover_loker');
              $filename = 'cover-' . Str::random(3) . time() . Str::random(10) . '.' . $cover->getClientOriginalExtension();
              $cover->move('img/loker/', $filename);
              $request['cover'] = $filename;
  
              Log::info('Gambar cover disimpan dengan nama: ' . $filename); // Logging penyimpanan gambar
          }
  
          $request['admin_id'] = Auth::user()->admin->id;
          $request['idt'] = IdtHelper::idtLoker($request->judul);
  
          Log::info('Admin ID dan IDT berhasil ditambahkan untuk Loker dengan judul: ' . $request->judul);
  
          // Menyimpan data loker ke database
          $loker = Loker::create($request->all());
          DB::commit();
          Log::info('Data loker berhasil disimpan ke database dengan ID: ' . $loker->id);
  
          // Proses pengiriman email berdasarkan jenis info (eksternal atau internal)
          if ($loker->info === 'eksternal') {
              Log::info('Mengirim email ke pengguna eksternal');
  
              $users = User::where('is_aktif', 1)
                          ->whereHas('pelamar', function ($query) {
                              $query->whereIn('type', ['umum', 'alumni']);
                          })
                          ->get();
  
              Log::info('Ditemukan ' . $users->count() . ' pengguna untuk info eksternal');
              
              foreach ($users as $user) {
                  if (filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                      if (Str::endsWith($user->email, '@gmail.com')) {
                          Log::info('Mengirim email ke Gmail: ' . $user->email);
                          Mail::to($user->email)->send(new LokerNotification($loker));
                          Log::info('Email berhasil dikirim ke: ' . $user->email);
                      } else {
                          Log::warning('Email bukan dari Gmail, tidak dikirim: ' . $user->email);
                      }
                  } else {
                      Log::warning('Email tidak valid: ' . $user->email);
                  }
              }
          } elseif ($loker->info === 'internal') {
              Log::info('Mengirim email ke pengguna internal (hanya alumni)');
  
              // Mengambil semua pelamar yang tipe 'alumni' saja
              $users = User::where('is_aktif', 1)
                          ->whereHas('pelamar', function ($query) {
                              $query->where('type', 'alumni'); 
                          })
                          ->get();
  
              Log::info('Ditemukan ' . $users->count() . ' alumni untuk info internal');
  
              foreach ($users as $user) {
                  if ($user->pelamar && $user->pelamar->type === 'alumni') {
                      if (filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                          if (Str::endsWith($user->email, '@gmail.com')) {
                              Log::info('Mengirim email ke alumni Gmail: ' . $user->email);
                              Mail::to($user->email)->send(new LokerNotification($loker));
                              Log::info('Email berhasil dikirim ke alumni: ' . $user->email);
                          } else {
                              Log::warning('Email alumni bukan dari Gmail, tidak dikirim: ' . $user->email);
                          }
                      } else {
                          Log::warning('Email alumni tidak valid: ' . $user->email);
                      }
                  } else {
                      Log::info('Pengguna ini bukan alumni, tidak mengirim email: ' . $user->email);
                  }
              }
          }
  
          return redirect(route('manage.loker.index'))->withSuccess('Data berhasil ditambahkan!');
      } catch (\Throwable $th) {
          DB::rollBack();
          Log::error('Error terjadi selama penyimpanan loker: ' . $th->getMessage());
          return redirect(route('manage.loker.index'))->withError('Gagal! silakan coba kembali');
      }
  }
  




  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Loker  $loker
   * @return \Illuminate\Http\Response
   */
  public function show(Loker $loker)
  {
    return view('pages.manage.loker.show', [
        'loker' => $loker->load('dudi'),
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Loker  $loker
   * @return \Illuminate\Http\Response
   */
  public function edit(Loker $loker)
  {
    if (Auth::user()->isAdminDudi() && $loker->dudi->idt != Auth::user()->admin->dudi->idt) abort(403);
    $dudi = Auth::user()->isAdminDudi()
            ? Dudi::where('id', Auth::user()->admin->dudi_id)->notdelete()->get()
            : Dudi::notdelete()->get();

    return view('pages.manage.loker.edit',[
      'loker' => $loker,
      'dudi' => $dudi,
      'kual_pend' => [ 'sd' => 'SD/MI/Sederajat', 'smp' => 'SMP/MTs/Sederajat', 'sma' => 'SMA/SMK/Sederajat', 'd3' => 'Diploma III', 's1' => 'Sarjana I', ],
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Loker  $loker
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Loker $loker)
  {
    $request->validate([
      'dudi_id' => 'required|exists:dudis,id',
      'status' => 'required',
      'tanggal_diunggah' => 'required|date',
      'tanggal_batas' => 'required|date',
      'kual_pend' => 'required',
      'kual_jurusan' => 'required',
      'judul' => 'required',
      'posisi' => 'required',
      'isi' => 'required',
      'info' => 'required',
      'cover_loker' => 'nullable|image',
    ]);

    try {
      DB::beginTransaction();
        if (filled($request->cover_loker)) {
          $cover = $request->file('cover_loker');
          $filename = 'cover-' . Str::random(3) . time() . Str::random(10) . '.' . $cover->getClientOriginalExtension();
          if ($request->old_cover != 'cover-loker.jpg') File::delete(public_path('/img/loker/' . $request->old_cover));
          $cover->move('img/loker/', $filename);
          $request['cover'] = $filename;
        }
        $request['idt'] = IdtHelper::idtLoker($request->judul);
        $loker->update($request->all());
      DB::commit();
      return redirect(route('manage.loker.index'))->withSuccess('Data berhasil diperbarui!');
    } catch (\Throwable $th) {
      DB::rollBack();
      return redirect(route('manage.loker.index'))->withError('Gagal! silakan coba kembali');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Loker  $loker
   * @return \Illuminate\Http\Response
   */
  public function destroy(Loker $loker)
  {
    if ($loker->cover != 'cover-loker.jpg') File::delete(public_path('/img/loker/' . $loker->cover));
    $loker->delete();
    return response()->json(['success' => 'Data berhasil dihapus!']);
  }
}
