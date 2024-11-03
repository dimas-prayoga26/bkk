<?php

namespace App\Http\Controllers\User;

use App\Helpers\IdtHelper;
use App\Http\Controllers\Controller;
use App\Models\Dudi;
use App\Models\Lamaran;
use App\Models\Loker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $loker = Loker::query();
        if ($request->status) $loker->where('status', $request->status);
        if ($request->dudi_id) $loker->where('dudi_id', $request->dudi_id);
        if ($request->cari) $loker->where('judul', 'like', '%' . $request->cari . '%')
                                  ->orWhere('info', 'like', '%' . $request->cari . '%')
                                  ->orWhere('kual_pend', 'like', '%' . $request->cari . '%')
                                  ->orWhere('kual_jurusan', 'like', '%' . $request->cari . '%')
                                  ->orWhere('posisi', 'like', '%' . $request->cari . '%')
                                  ->orWhere('isi', 'like', '%' . $request->cari . '%');
        return view('pages.users.loker.index',[
          'loker' => $loker->with('dudi')->orderBy('tanggal_diunggah', 'desc')->paginate(12)->withQueryString(),
          'dudi' => Dudi::notdelete()->select('id','name')->get(),
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
      $berkas = Auth::user()->pelamar->berkas;
      if (
        $berkas->surat_lamaran == null ||
        $berkas->cv == null ||
        $berkas->ktp == null ||
        $berkas->ijazah == null ||
        $berkas->skck == null
      ) {
        return response()->json(['errors' => 'Berkas anda belum lengkap, silahkan lengkapi terlebih dahulu!']);
      }

      $lokerDilamar = Lamaran::where('pelamar_id', Auth::user()->pelamar->id)->pluck('loker_id')->toArray();
      try {
        DB::beginTransaction();

        if (!in_array($request->id, $lokerDilamar)) {
          if (Loker::find($request->id)->status == 'buka') {
            Lamaran::create([
              'idt' => IdtHelper::idtLamaran(),
              'pelamar_id' => Auth::user()->pelamar->id,
              'loker_id' => $request->id,
            ]);
            DB::commit();
            return response()->json(['success' => 'Anda berhasil melamar pekerjaan ini! Tim segera melakukan verifikasi']);
          } else {
            return response()->json(['errors' => 'Lowongan telah ditutup!']);
          }
        } else {
          return response()->json(['errors' => 'Lamaran gagal! Anda sudah melamar pekerjaan ini!']);
        }
      } catch (\Throwable $th) {
        DB::rollBack();
        return response()->json(['errors' => 'Permintaan gagal! silakan coba lagi.']);
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Loker $loker)
    {
      $lokerDilamar = (Auth::check()) ? Lamaran::where('pelamar_id', Auth::user()->pelamar->id)->pluck('loker_id')->toArray()
                                      : [];
      return view('pages.users.loker.show', [
          'loker' => $loker->load('dudi'),
          'lokerDilamar' => $lokerDilamar,
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
