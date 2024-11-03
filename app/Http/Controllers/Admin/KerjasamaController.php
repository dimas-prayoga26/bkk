<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKerjasama;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KerjasamaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $kerjasama = JenisKerjasama::query();
    if ($request->ajax()) {
      return DataTables::of($kerjasama)->addIndexColumn()
                       ->addColumn('aksi', fn($data) => view('pages.manage.kerjasama.aksi', ['data' => $data]))
                       ->make(true);
    }
    return view('pages.manage.kerjasama.index',[
      'kerjasama' => $kerjasama,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('pages.manage.kerjasama.create',[
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
      'name' => 'required|unique:jenis_kerjasamas',
    ]);

    JenisKerjasama::create($request->all());
    return redirect(route('manage.kerjasama.index'))->withSuccess('Data Kerjasama berhasil ditambahkan!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\JenisKerjasama  $kerjasama
   * @return \Illuminate\Http\Response
   */
  public function show(JenisKerjasama $kerjasama)
  {
    // return view('pages.manage.kerjasama.show',[
    //   'kerjasama' => $kerjasama,
    // ]);
    abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\JenisKerjasama  $kerjasama
   * @return \Illuminate\Http\Response
   */
  public function edit(JenisKerjasama $kerjasama)
  {
    return view('pages.manage.kerjasama.edit',[
      'kerjasama' => $kerjasama,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\JenisKerjasama  $kerjasama
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, JenisKerjasama $kerjasama)
  {
    $request->validate([
      'name' => 'required|unique:jenis_kerjasamas,name,' . $kerjasama->id,
    ]);

    $kerjasama->update($request->all());
    return redirect(route('manage.kerjasama.index'))->withSuccess('Data Kerjasama berhasil diperbarui!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\JenisKerjasama  $kerjasama
   * @return \Illuminate\Http\Response
   */
  public function destroy(JenisKerjasama $kerjasama)
  {
    $kerjasama->delete();
    return response()->json(['success' => 'Data berhasil dihapus!']);
  }
}
