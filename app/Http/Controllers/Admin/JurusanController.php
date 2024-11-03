<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JurusanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $jurusan = Jurusan::query();
    if ($request->ajax()) {
      return DataTables::of($jurusan->withCount('alumni'))->addIndexColumn()
                       ->editColumn('alumni.count', fn($data) => $data->alumni_count)
                       ->addColumn('aksi', fn($data) => view('pages.manage.jurusan.aksi', ['data' => $data]))
                       ->make(true);
    }
    return view('pages.manage.jurusan.index',[
      'jurusan' => $jurusan,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('pages.manage.jurusan.create',[
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
      'name' => 'required|unique:jurusans',
      'singkatan' => 'required|unique:jurusans',
    ]);

    Jurusan::create($request->all());
    return redirect(route('manage.jurusan.index'))->withSuccess('Data Jurusan berhasil ditambahkan!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Jurusan  $jurusan
   * @return \Illuminate\Http\Response
   */
  public function show(Jurusan $jurusan)
  {
    // return view('pages.manage.jurusan.show',[
    //   'jurusan' => $jurusan,
    // ]);
    abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Jurusan  $jurusan
   * @return \Illuminate\Http\Response
   */
  public function edit(Jurusan $jurusan)
  {
    return view('pages.manage.jurusan.edit',[
      'jurusan' => $jurusan,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Jurusan  $jurusan
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Jurusan $jurusan)
  {
    $request->validate([
      'name' => 'required|unique:jurusans,name,' . $jurusan->id,
      'singkatan' => 'required|unique:jurusans,singkatan,' . $jurusan->id,
    ]);

    $jurusan->update($request->all());
    return redirect(route('manage.jurusan.index'))->withSuccess('Data Jurusan berhasil diperbarui!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Jurusan  $jurusan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Jurusan $jurusan)
  {
    $jurusan->delete();
    return response()->json(['success' => 'Data berhasil dihapus!']);
  }
}
