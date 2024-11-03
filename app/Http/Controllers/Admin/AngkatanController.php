<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AngkatanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $angkatan = Angkatan::query();
    if ($request->ajax()) {
      return DataTables::of($angkatan->withCount('alumni'))->addIndexColumn()
                       ->editColumn('alumni.count', fn($data) => $data->alumni_count)
                       ->addColumn('aksi', fn($data) => view('pages.manage.angkatan.aksi', ['data' => $data]))
                       ->make(true);
    }
    return view('pages.manage.angkatan.index',[
      'angkatan' => $angkatan,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('pages.manage.angkatan.create',[
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
      'tahun' => 'required|unique:angkatans',
    ]);

    Angkatan::create($request->all());
    return redirect(route('manage.angkatan.index'))->withSuccess('Data Angkatan berhasil ditambahkan!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Angkatan  $angkatan
   * @return \Illuminate\Http\Response
   */
  public function show(Angkatan $angkatan)
  {
    // return view('pages.manage.angkatan.show',[
    //   'angkatan' => $angkatan,
    // ]);
    abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Angkatan  $angkatan
   * @return \Illuminate\Http\Response
   */
  public function edit(Angkatan $angkatan)
  {
    return view('pages.manage.angkatan.edit',[
      'angkatan' => $angkatan,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Angkatan  $angkatan
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Angkatan $angkatan)
  {
    $request->validate([
      'tahun' => 'required|unique:angkatans,tahun,' . $angkatan->id,
    ]);

    $angkatan->update($request->all());
    return redirect(route('manage.angkatan.index'))->withSuccess('Data Angkatan berhasil diperbarui!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Angkatan  $angkatan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Angkatan $angkatan)
  {
    // Pelamar::whereHas('alumni', fn($q) => $q->where('angkatan_id', $angkatan->id))->delete();
    $angkatan->delete();
    return response()->json(['success' => 'Data berhasil dihapus!']);
  }
}
