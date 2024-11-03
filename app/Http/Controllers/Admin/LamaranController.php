<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dudi;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class LamaranController extends Controller
{
    public function index(Request $request)
    {
      $lamaran = Auth::user()->isAdminDudi()
            ? Lamaran::whereHas('loker', fn($q) => $q->where('dudi_id', Auth::user()->admin->dudi_id))
            : Lamaran::query();

      if ($request->dudi_id) $lamaran->whereHas('loker', fn($q) => $q->where('dudi_id', $request->dudi_id));
      if ($request->status) $lamaran->where('status', $request->status);

      if ($request->ajax()) {
        return DataTables::of($lamaran->with(['pelamar.user','loker.dudi'])->latest())->addIndexColumn()
          ->editColumn('pelamar.name', fn($data) => $data->pelamar->user->name)
          ->editColumn('dudi.name', fn($data) => $data->loker->dudi->name)
          ->editColumn('loker.posisi', fn($data) => $data->loker->posisi)
          ->editColumn('tanggalmelamar', fn($data) => \Carbon\Carbon::parse($data->created_at)->isoFormat('D MMMM YYYY'))
          ->editColumn('tanggalwawancara', fn($data) =>  $data->status == 'wawancara' && $data->tanggalwawancara != null ? \Carbon\Carbon::parse($data->tanggalwawancara)->isoFormat('D MMMM YYYY') : '-')
        ->editColumn('status', function($data){
            if ($data->status == 'belum') {
              $status = '<span class="badge badge-sm badge-warning">BELUM DIVERIFIKASI</span>';
            } else if ($data->status == 'proses') {
              $status = '<span class="badge badge-sm badge-primary">DIPROSES</span>';
            } else if ($data->status == 'lolos') {
              $status = '<span class="badge badge-sm badge-success">LOLOS VERIFIKASI</span>';
            } else if ($data->status == 'tidaklolos') {
              $status = '<span class="badge badge-sm badge-danger">TIDAK LOLOS</span>';
            } else if ($data->status == 'wawancara') {
              $status = '<span class="badge badge-sm badge-info">WAWANCARA</span>';
            }
            return $status;
          })
          ->addColumn('aksi', fn($data) => view('pages.manage.lamaran.aksi', ['data' => $data]))
          ->rawColumns(['status'])
          ->make(true);
      }
      return view('pages.manage.lamaran.index',[
        'lamaran' => $lamaran,
        'dudi' => Dudi::get(),
        'master_status' => [
          'belum' => 'Belum Diverifikasi',
          'proses' => 'Diproses',
          'lolos' => 'Lolos Verifikasi',
          'tidaklolos' => 'Tidak Lolos',
          'wawancara' => 'Wawancara',
        ],
      ]);
    }

    public function update(Request $request, Lamaran $lamaran) {
      $validasi = Validator::make($request->all(),[
        'status' => 'required',
      ]);
      if ($validasi->fails()) {
        return response()->json(['error' => 'Gagal! pastikan kolom terisi, silakan coba lagi!']);
      }

      try {
        $lamaran->update([
          'status' => $request->status,
          'tanggalwawancara' => $request->tanggalwawancara,
        ]);
        return response()->json(['success' => 'Data berhasil diperbarui']);
      } catch (\Throwable $th) {
        return response()->json(['error' => 'Gagal! silakan coba lagi!']);
      }

    }

    public function print(Request $request) {
      $lamaran = Auth::user()->isAdminDudi()
            ? Lamaran::whereHas('loker', fn($q) => $q->where('dudi_id', Auth::user()->admin->dudi_id))
            : Lamaran::query();

      if ($request->dudi_id) $lamaran->whereHas('loker', fn($q) => $q->where('dudi_id', $request->dudi_id));
      if ($request->status) $lamaran->where('status', $request->status);

      if ($request->ajax()) {
        return DataTables::of($lamaran->with(['pelamar.user','loker.dudi'])->latest())->addIndexColumn()
          ->editColumn('pelamar.name', fn($data) => $data->pelamar->user->name)
          ->editColumn('dudi.name', fn($data) => $data->loker->dudi->name)
          ->editColumn('loker.posisi', fn($data) => $data->loker->posisi)
          ->editColumn('tanggalmelamar', fn($data) => \Carbon\Carbon::parse($data->created_at)->isoFormat('D MMMM YYYY'))
          ->editColumn('tanggalwawancara', fn($data) =>  $data->status == 'wawancara' && $data->tanggalwawancara != null ? \Carbon\Carbon::parse($data->tanggalwawancara)->isoFormat('D MMMM YYYY') : '-')
          ->editColumn('status', function($data){
              if ($data->status == 'belum') {
                $status = '<span class="badge badge-sm badge-warning">BELUM DIVERIFIKASI</span>';
              } else if ($data->status == 'proses') {
                $status = '<span class="badge badge-sm badge-primary">DIPROSES</span>';
              } else if ($data->status == 'lolos') {
                $status = '<span class="badge badge-sm badge-success">LOLOS VERIFIKASI</span>';
              } else if ($data->status == 'tidaklolos') {
                $status = '<span class="badge badge-sm badge-danger">TIDAK LOLOS</span>';
              } else if ($data->status == 'wawancara') {
                $status = '<span class="badge badge-sm badge-info">WAWANCARA</span>';
              }
              return $status;
            })
            ->editColumn('pelamar.user.email', fn($data) => $data->pelamar->user->email)
            ->editColumn('pelamar.nik', fn($data) => $data->pelamar->nik)
            ->editColumn('pelamar.user.jk', fn($data) => $data->pelamar->user->jk == 'l' ? 'L' : 'P')
            ->editColumn('pelamar.user.tempatlahir', fn($data) => $data->pelamar->user->tempatlahir)
            ->editColumn('pelamar.user.tanggallahir', fn($data) => $data->pelamar->user->tanggallahir)
            ->editColumn('pelamar.user.telepon', fn($data) => $data->pelamar->user->telepon)
            ->editColumn('pelamar.user.alamat', fn($data) => $data->pelamar->user->alamat)
            ->editColumn('pelamar.pend_terakhir', fn($data) => $data->pelamar->pend_terakhir)
            ->editColumn('pelamar.jurusan_terakhir', fn($data) => $data->pelamar->jurusan_terakhir)
            ->editColumn('pelamar.tahun_lulus', fn($data) => $data->pelamar->tahun_lulus)
            ->rawColumns(['status'])
            ->make(true);
      }

      return view('pages.manage.lamaran.print', [
        'lamaran' => $lamaran,
        'dudi' => Dudi::get(),
        'master_status' => [
          'belum' => 'Belum Diverifikasi',
          'proses' => 'Diproses',
          'lolos' => 'Lolos Verifikasi',
          'tidaklolos' => 'Tidak Lolos',
          'wawancara' => 'Wawancara',
        ],
      ]);
    }

}
