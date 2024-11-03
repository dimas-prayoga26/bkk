<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Visimisi;
use Illuminate\Http\Request;

class VisimisiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      if (Visimisi::count() >= 1) {
        $visimisi = Visimisi::first();
        return view('pages.users.visimisi.index', compact('visimisi'));
      } else {
        return view('pages.users.visimisi.index');
      }
    }
}
