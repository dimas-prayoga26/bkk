<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Dudi;
use App\Models\JenisKerjasama;
use Illuminate\Http\Request;

class DudiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->ajax()) {
          $dudi = Dudi::notdelete();
          if ($request->jenis_kerjasama_id) $dudi->whereHas('kerjasama', fn($q) => $q->where('jenis_kerjasama_id', $request->jenis_kerjasama_id));
          if ($request->cari) $dudi->where('name', 'like', '%' . $request->cari . '%')
                                  ->orWhere('alamat', 'like', '%' . $request->cari . '%');
          return response()->json(['dudi' => $dudi->with('kerjasama.jenisKerjasama')->get()]);
        }
        return view('pages.users.dudi.index',[
          'dudi' => [],
          'jenisKerjasama' => JenisKerjasama::get(),
        ]);
    }

}
