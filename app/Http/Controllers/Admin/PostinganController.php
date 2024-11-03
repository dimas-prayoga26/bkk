<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\IdtHelper;
use App\Http\Controllers\Controller;
use App\Models\Postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PostinganController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $postingan = Postingan::query();

    if ($request->kategori) $postingan->where('kategori', $request->kategori);
    if ($request->status) $postingan->where('status', $request->status);

    if ($request->ajax()) {
      return DataTables::of($postingan->with('admin.user:id,name')->orderBy('tanggal', 'desc'))->addIndexColumn()
        ->editColumn('judul', fn($data) => Str::limit($data->judul, 50, '...'))
        ->editColumn('kategori', fn($data) => Str::title($data->kategori))
        ->editColumn('admin.name', fn($data) => $data->admin->user->name)
        ->editColumn('tanggal', fn($data) => date("d-m-Y", strtotime($data->tanggal)))
        ->editColumn('status', function($data){
          return ($data->status == 'public')
            ? '<span class="badge badge-sm badge-success">PUBLIK</span>'
            : '<span class="badge badge-sm badge-info">PRIVASI</span>';
        })
        ->addColumn('aksi', fn($data) => view('pages.manage.postingan.aksi', ['data' => $data]))
        ->rawColumns(['status'])
        ->make(true);
    }
    return view('pages.manage.postingan.index',[
      'postingan' => $postingan,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('pages.manage.postingan.create',[
        //
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
    $request->validate([
      'status' => 'required',
      'kategori' => 'required',
      'tanggal' => 'required',
      'judul' => 'required',
      'isi' => 'required',
      'cover' => 'required|image',
    ]);

    try {
      DB::beginTransaction();
        $request ['excerpt'] = Str::limit(strip_tags($request->isi), 100, '...');
        if (filled($request->cover)) {
          $cover = $request->file('cover');
          $filename = 'cover-' . Str::random(3) . time() . Str::random(10) . '.' . $cover->getClientOriginalExtension();
          $cover->move('img/postingan/', $filename);
          $request['cover'] = $filename;
          Postingan::create([
            'idt' => IdtHelper::idtPostingan($request->judul),
            'admin_id' => Auth::user()->admin->id,
            'status' => $request->status,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'cover' => $filename,
            'excerpt' => $request->excerpt,
          ]);
        } else {
          Postingan::create($request->except('cover'));
        }
      DB::commit();
      return redirect(route('manage.postingan.index'))->withSuccess('Data berhasil ditambahkan!');
    } catch (\Throwable $th) {
      DB::rollBack();
      return redirect(route('manage.postingan.index'))->withFailed('Gagal! silakan coba kembali');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Postingan  $postingan
   * @return \Illuminate\Http\Response
   */
  public function show(Postingan $postingan)
  {
    return view('pages.manage.postingan.show',[
       'postingan' => $postingan,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Postingan  $postingan
   * @return \Illuminate\Http\Response
   */
  public function edit(Postingan $postingan)
  {
    return view('pages.manage.postingan.edit',[
      'postingan' => $postingan,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Postingan  $postingan
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Postingan $postingan)
  {
    $request->validate([
      'status' => 'required',
      'kategori' => 'required',
      'tanggal' => 'required',
      'judul' => 'required',
      'isi' => 'required',
      'cover' => 'nullable|image',
    ]);

    try {
      DB::beginTransaction();
        $request ['excerpt'] = Str::limit(strip_tags($request->isi), 100, '...');
        $request['idt'] = ($postingan->judul != $request->judul) ? IdtHelper::idtPostingan($request->judul) : $postingan->idt;
        if (filled($request->cover)) {
          $cover = $request->file('cover');
          $filename = 'cover-' . Str::random(3) . time() . Str::random(10) . '.' . $cover->getClientOriginalExtension();
          $cover->move('img/postingan/', $filename);
          if ($request->old_cover != 'cover-postingan.jpg') File::delete(public_path('/img/postingan/' . $request->old_cover));
          $request['cover'] = $filename;
          $postingan->update([
            'status' => $request->status,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'cover' => $filename,
            'excerpt' => $request->excerpt,
            'idt' => $request->idt,
          ]);
        } else {
          $postingan->update($request->except('cover'));
        }
      DB::commit();
      return redirect(route('manage.postingan.index'))->withSuccess('Data berhasil diperbarui!');
    } catch (\Throwable $th) {
      DB::rollBack();
      return redirect(route('manage.postingan.index'))->withFailed('Gagal! silakan coba kembali');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Postingan  $postingan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Postingan $postingan)
  {
    if ($postingan->cover != 'cover-postingan.jpg') File::delete(public_path('/img/postingan/' . $postingan->cover));
    $postingan->delete();
    return response()->json(['success' => 'Data berhasil dihapus!']);
  }
}
