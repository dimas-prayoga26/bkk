<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Angkatan;
use App\Models\Jurusan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class TracerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $tracer = Alumni::query();

      if ($request->angkatan) $tracer->where('angkatan_id', $request->angkatan);
      if ($request->jurusan) $tracer->where('jurusan_id', $request->jurusan);
      if ($request->kegiatan) $tracer->where('kegiatan_id', $request->kegiatan);

      if ($request->ajax()) {
        return DataTables::of($tracer->with(['pelamar.user:id,name','angkatan:id,tahun','jurusan:id,name','kegiatan:id,name']))->addIndexColumn()
          ->editColumn('name', fn($data) => $data->pelamar->user->name)
          ->editColumn('angkatan.tahun', fn($data) => $data->angkatan ? $data->angkatan->tahun : '-')
          ->editColumn('jurusan.name', fn($data) => $data->jurusan ? $data->jurusan->name : '-')
          ->editColumn('kegiatan.name', fn($data) => $data->kegiatan ? $data->kegiatan->name : '-')
          ->addColumn('aksi', fn($data) => view('pages.manage.tracer.aksi', ['data' => $data]))
          ->rawColumns(['status'])
          ->make(true);
      }

      $kegiatans = Kegiatan::select('id', 'name')->get();
      $data = [];
      $countAlumni = 0;

      $availableColors = ['#FF9843', '#FFDD95', '#86A7FC', '#3468C0', '#756AB6', '#AC87C5', '#C21292', '#EF4040', '#9A3B3B', '#863A6F'];

      foreach ($kegiatans as $i => $kegiatan) {
          $alumni = Alumni::query(); // Buat objek baru di setiap iterasi
          if ($request->angkatan_id) $alumni->where('angkatan_id', $request->angkatan_id);

          $count = $alumni->where('kegiatan_id', $kegiatan->id)->count();

          // Pilih warna secara acak dan hapus dari array indeks warna yang tersedia
          $randomColorIndex = array_rand($availableColors);
          $selectedColor = $availableColors[$randomColorIndex];
          unset($availableColors[$randomColorIndex]);
          $availableColors = array_values($availableColors);

          $data[] = [
              'count' => $count,
              'name' => $kegiatan->name,
              'bgcolor' => $selectedColor,
          ];
          $countAlumni += $count;
      }

      return view('pages.manage.tracer.index',[
        'tracer' => $tracer,
        'angkatan' => Angkatan::get(),
        'jurusan' => Jurusan::get(),
        'kegiatan' => Kegiatan::get(),
        'alumniStats' => $data,
        'countAlumni' => $countAlumni,
      ]);
    }

    public function print(Request $request)
    {
      $tracer = Alumni::query();

      if ($request->angkatan) $tracer->where('angkatan_id', $request->angkatan);
      if ($request->jurusan) $tracer->where('jurusan_id', $request->jurusan);
      if ($request->kegiatan) $tracer->where('kegiatan_id', $request->kegiatan);

      if ($request->ajax()) {
        return DataTables::of($tracer->with(['pelamar.user:id,name','angkatan:id,tahun','jurusan:id,name','kegiatan:id,name']))->addIndexColumn()
          ->editColumn('name', fn($data) => $data->pelamar->user->name)
          ->editColumn('angkatan.tahun', fn($data) => $data->angkatan ? $data->angkatan->tahun : '-')
          ->editColumn('jurusan.name', fn($data) => $data->jurusan ? $data->jurusan->name : '-')
          ->editColumn('kegiatan.name', fn($data) => $data->kegiatan ? $data->kegiatan->name : '-')
          ->rawColumns(['status'])
          ->make(true);
      }
      return view('pages.manage.tracer.print',[
        'tracer' => $tracer,
        'angkatan' => Angkatan::get(),
        'jurusan' => Jurusan::get(),
        'kegiatan' => Kegiatan::get(),
      ]);
    }
}
