<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Postingan;
use Illuminate\Http\Request;

class PostinganController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
      $postingan = Postingan::where('status', 'public');
      if ($request->kategori) $postingan->where('kategori', $request->kategori);
      if ($request->cari) $postingan->where('judul', 'like', '%' . $request->cari . '%')
                                ->orWhere('kategori', 'like', '%' . $request->cari . '%')
                                ->orWhere('isi', 'like', '%' . $request->cari . '%');
      return view('pages.users.postingan.index',[
        'postingan' => $postingan->with('admin.user:id,name')->orderBy('tanggal', 'desc')->paginate(9)->withQueryString(),
        'kategori' => ['pengumuman','artikel','berita'],
      ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Postingan $postingan)
  {
    $postingan->load(['admin']);

    return view('pages.users.postingan.show', [
        'postingan' => $postingan,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
