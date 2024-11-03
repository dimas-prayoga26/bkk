<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visimisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class VisimisiController extends Controller
{
  public function index(){
    if (Visimisi::count() >= 1) {
      $visimisi = Visimisi::first();
      return view('pages.manage.visimisi.index', compact('visimisi'));
    } else {
      return view('pages.manage.visimisi.index');
    }
  }

  public function store(Request $request){
    $request->validate([
      'isi' => 'required',
      'cover' => 'required|image'
    ]);

    try {
      DB::beginTransaction();
      $cover = $request->file('cover');
        $filename = 'cover-' . Str::random(3) . time() . Str::random(10) . '.' . $cover->getClientOriginalExtension();
        $cover->move('img/visimisi/', $filename);
        Visimisi::create([
          'isi' => $request->isi,
          'cover' => $filename
        ]);
      DB::commit();
      return back()->withSuccess('Data berhasil ditambahkan!');
    } catch (\Throwable $th) {
      DB::rollBack();
      return back()->withError('Gagal! silakan coba lagi');
    }
  }

  public function update(Request $request, Visimisi $visimisi){
    $request->validate([
      'isi' => 'required',
      'cover' => 'nullable|image'
    ]);

    try {
      DB::beginTransaction();
        if (filled($request->cover)) {
          $cover = $request->file('cover');
          $filename = 'cover-' . Str::random(3) . time() . Str::random(10) . '.' . $cover->getClientOriginalExtension();
          $cover->move('img/visimisi/', $filename);
          if ($request->old_cover != 'cover-visimisi.jpg') File::delete(public_path('/img/visimisi/' . $request->old_cover));
          $request['cover'] = $filename;
          $visimisi->update([
            'cover' => $filename,
            'isi' => $request->isi,
          ]);
        } else {
          $visimisi->update($request->only('isi'));
        }
      DB::commit();
      return back()->withSuccess('Data berhasil diperbarui!');
    } catch (\Throwable $th) {
      DB::rollBack();
      return back()->withError('Gagal! silakan coba lagi');
    }
  }
}
