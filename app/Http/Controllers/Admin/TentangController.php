<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TentangController extends Controller
{
    public function index(){
      if (Tentang::count() >= 1) {
        $tentang = Tentang::first();
        return view('pages.manage.tentang.index', compact('tentang'));
      } else {
        return view('pages.manage.tentang.index');
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
          $cover->move('img/tentang/', $filename);
          Tentang::create([
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

    public function update(Request $request, Tentang $tentang){
      $request->validate([
        'isi' => 'required',
        'cover' => 'nullable|image'
      ]);

      try {
        DB::beginTransaction();
          if (filled($request->cover)) {
            $cover = $request->file('cover');
            $filename = 'cover-' . Str::random(3) . time() . Str::random(10) . '.' . $cover->getClientOriginalExtension();
            $cover->move('img/tentang/', $filename);
            if ($request->old_cover != 'cover-tentang.jpg') File::delete(public_path('/img/tentang/' . $request->old_cover));
            $request['cover'] = $filename;
            $tentang->update([
              'cover' => $filename,
              'isi' => $request->isi,
            ]);
          } else {
            $tentang->update($request->only('isi'));
          }
        DB::commit();
        return back()->withSuccess('Data berhasil diperbarui!');
      } catch (\Throwable $th) {
        DB::rollBack();
        return back()->withError('Gagal! silakan coba lagi');
      }
    }
}
