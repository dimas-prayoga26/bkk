<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Tentang;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      if (Tentang::count() >= 1) {
        $tentang = Tentang::first();
        return view('pages.users.tentang.index', compact('tentang'));
      } else {
        return view('pages.users.tentang.index');
      }
    }
}
