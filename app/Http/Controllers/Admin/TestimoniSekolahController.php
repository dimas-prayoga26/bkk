<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestimoniSekolah;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TestimoniSekolahController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $testimonisekolah = TestimoniSekolah::query();
    if ($request->ajax()) {
      return DataTables::of($testimonisekolah)->addIndexColumn()
                       ->addColumn('aksi', fn($data) => view('pages.manage.testimonisekolah.aksi', ['data' => $data]))
                       ->make(true);
    }
    return view('pages.manage.testimonisekolah.index',[
      'testimonisekolah' => $testimonisekolah,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('pages.manage.testimonisekolah.create',[
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
      'judul' => 'required',
      'link' => 'required',
    ]);

    TestimoniSekolah::create($request->all());
    return redirect(route('manage.testimonisekolah.index'))->withSuccess('Data Testimoni berhasil ditambahkan!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\TestimoniSekolah  $testimonisekolah
   * @return \Illuminate\Http\Response
   */
  public function show(TestimoniSekolah $testimonisekolah)
  {
    // return view('pages.manage.testimonisekolah.show',[
    //   'testimonisekolah' => $testimonisekolah,
    // ]);
    abort(404);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\TestimoniSekolah  $testimonisekolah
   * @return \Illuminate\Http\Response
   */
  public function edit(TestimoniSekolah $testimonisekolah)
  {
    return view('pages.manage.testimonisekolah.edit',[
      'testimonisekolah' => $testimonisekolah,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\TestimoniSekolah  $testimonisekolah
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, TestimoniSekolah $testimonisekolah)
  {
    $request->validate([
      'judul' => 'required',
      'link' => 'required',
    ]);

    $testimonisekolah->update($request->all());
    return redirect(route('manage.testimonisekolah.index'))->withSuccess('Data Testimoni berhasil diperbarui!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\TestimoniSekolah  $testimonisekolah
   * @return \Illuminate\Http\Response
   */
  public function destroy(TestimoniSekolah $testimonisekolah)
  {
    $testimonisekolah->delete();
    return response()->json(['success' => 'Data berhasil dihapus!']);
  }
}
