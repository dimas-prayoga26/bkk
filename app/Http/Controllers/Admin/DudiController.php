<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\IdtHelper;
use App\Http\Controllers\Controller;
use App\Models\Dudi;
use App\Models\JenisKerjasama;
use App\Models\Kerjasama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class DudiController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $dudi = Auth::user()->isAdminDudi()
            ? Dudi::where('id', Auth::user()->admin->dudi_id)->notdelete()
            : Dudi::notdelete();

    if ($request->ajax()) {
      return DataTables::of($dudi->with('kerjasama.jenisKerjasama'))->addIndexColumn()
        ->editColumn('name', function($data) {
          $avatar = '<div class="symbol  symbol-50px overflow-hidden me-3">
                          <div class="symbol-label">
                              <img src="/img/logo/' . $data->logo . '" alt="Avatar" class="w-100" />
                          </div>
                      </div>';

          $userDetails = '<div class="d-flex flex-column">
                              <span class="text-gray-800 mb-1">' . $data->name . '</span>
                          </div>';

          return '<div class="d-flex align-items-center">' . $avatar . $userDetails . '</div>';
        })
        ->editColumn('kerjasama', function($data) {
          if ($data->kerjasama->count() >= 1) {
              $badges = '';
              foreach ($data->kerjasama as $item) {
                  $badges .= '<span class="badge badge-sm badge-light-primary me-2 mb-2">' . $item->jenisKerjasama->name . '</span>';
              }
              return $badges;
          } else {
              return '-';
          }
        })
        ->addColumn('aksi', fn($data) => view('pages.manage.dudi.aksi', ['data' => $data]))
        ->rawColumns(['kerjasama','name'])
        ->make(true);
    }
    return view('pages.manage.dudi.index',[
      'dudi' => $dudi,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $this->authorize('adminsekolah');
      return view('pages.manage.dudi.create',[
        'jeniskerjasama' => JenisKerjasama::get(),
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
      'name' => 'required',
      'email' => 'required',
      'telepon' => 'required',
      'kota' => 'required',
      'alamat' => 'required',
      'logo_dudi' => 'nullable|image',
      'jenis_kerjasama' => 'nullable|array',
    ]);

    try {
      DB::beginTransaction();
        if (filled($request->logo_dudi)) {
          $logo_dudi = $request->file('logo_dudi');
          $filename = 'logo_dudi-' . Str::random(3) . time() . Str::random(10) . '.' . $logo_dudi->getClientOriginalExtension();
          $logo_dudi->move('img/logo/', $filename);
          $request['logo'] = $filename;
        }

        $request['idt'] = IdtHelper::idtDudi($request->name);
        $dudi = Dudi::create($request->except('logo_dudi'));

        if (filled($request->jenis_kerjasama)) {
          foreach($request->jenis_kerjasama as $i => $jenisKerjasamaId){
            Kerjasama::create([
              'dudi_id' => $dudi->id,
              'jenis_kerjasama_id' => $jenisKerjasamaId
            ]);
          }
        }

      DB::commit();
      return redirect(route('manage.dudi.index'))->withSuccess('Data berhasil ditambahkan!');
    } catch (\Throwable $th) {
      DB::rollBack();
      return redirect(route('manage.dudi.index'))->withError('Gagal! silakan coba kembali');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Dudi  $dudi
   * @return \Illuminate\Http\Response
   */
  public function show(Dudi $dudi)
  {
    // return view('pages.manage.dudi.show',[
    //   'dudi' => $dudi,
    // ]);
    abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Dudi  $dudi
   * @return \Illuminate\Http\Response
   */
  public function edit(Dudi $dudi)
  {
    $kerjasama = ($dudi->kerjasama->count() > 0)
                ? $dudi->kerjasama->pluck('jenis_kerjasama_id')->toArray()
                : [];
    return view('pages.manage.dudi.edit',[
      'dudi' => $dudi,
      'jeniskerjasama' => JenisKerjasama::get(),
      'kerjasama' => $kerjasama,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Dudi  $dudi
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Dudi $dudi)
  {
    $request->validate([
      'name' => 'required',
      'email' => 'required',
      'telepon' => 'required',
      'kota' => 'required',
      'alamat' => 'required',
      'logo_dudi' => 'nullable|image',
      'jenis_kerjasama' => 'nullable|array',
    ]);

    try {
      DB::beginTransaction();
        if (filled($request->logo_dudi)) {
          $logo_dudi = $request->file('logo_dudi');
          $filename = 'logo_dudi-' . Str::random(3) . time() . Str::random(10) . '.' . $logo_dudi->getClientOriginalExtension();
          if ($request->old_logo != 'logo-dudi.jpg') File::delete(public_path('/img/logo/' . $request->old_logo));
          $logo_dudi->move('img/logo/', $filename);
          $request['logo'] = $filename;
        }

        $request['idt'] = IdtHelper::idtDudi($request->name);
        $dudi->update($request->all());

        if ($dudi->kerjasama->count() >= 1) Kerjasama::where('dudi_id', $dudi->id)->delete();

        if (filled($request->jenis_kerjasama)) {
          foreach($request->jenis_kerjasama as $i => $jenisKerjasamaId){
            Kerjasama::create([
              'dudi_id' => $dudi->id,
              'jenis_kerjasama_id' => $jenisKerjasamaId
            ]);
          }
        }

      DB::commit();
      return redirect(route('manage.dudi.index'))->withSuccess('Data berhasil diperbarui!');
    } catch (\Throwable $th) {
      DB::rollBack();
      return redirect(route('manage.dudi.index'))->withError('Gagal! silakan coba kembali');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Dudi  $dudi
   * @return \Illuminate\Http\Response
   */
  public function destroy(Dudi $dudi)
  {
    $dudi->deleteData();
    return response()->json(['success' => 'Data berhasil dihapus!']);
  }
}
