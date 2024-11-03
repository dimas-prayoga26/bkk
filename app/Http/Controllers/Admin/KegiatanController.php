<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KegiatanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $kegiatan = Kegiatan::query();
    if ($request->ajax()) {
      return DataTables::of($kegiatan->withCount('alumni'))->addIndexColumn()
                       ->editColumn('alumni.count', fn($data) => $data->alumni_count)
                       ->addColumn('aksi', fn($data) => view('pages.manage.kegiatan.aksi', ['data' => $data]))
                       ->make(true);
    }
    return view('pages.manage.kegiatan.index',[
      'kegiatan' => $kegiatan,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('pages.manage.kegiatan.create',[
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
      'name' => 'required|unique:kegiatans',
    ]);

    Kegiatan::create($request->all());
    return redirect(route('manage.kegiatan.index'))->withSuccess('Data Kegiatan berhasil ditambahkan!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Kegiatan  $kegiatan
   * @return \Illuminate\Http\Response
   */
  public function show(Kegiatan $kegiatan)
  {
    // return view('pages.manage.kegiatan.show',[
    //   'kegiatan' => $kegiatan,
    // ]);
    abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Kegiatan  $kegiatan
   * @return \Illuminate\Http\Response
   */
  public function edit(Kegiatan $kegiatan)
  {
    return view('pages.manage.kegiatan.edit',[
      'kegiatan' => $kegiatan,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Kegiatan  $kegiatan
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Kegiatan $kegiatan)
  {
    $request->validate([
      'name' => 'required|unique:kegiatans,name,' . $kegiatan->id,
    ]);

    $kegiatan->update($request->all());
    return redirect(route('manage.kegiatan.index'))->withSuccess('Data Kegiatan berhasil diperbarui!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Kegiatan  $kegiatan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Kegiatan $kegiatan)
  {
    $kegiatan->delete();
    return response()->json(['success' => 'Data berhasil dihapus!']);
  }
}
