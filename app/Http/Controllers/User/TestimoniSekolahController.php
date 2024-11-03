<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TestimoniSekolah;
use Illuminate\Http\Request;

class TestimoniSekolahController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('pages.users.testimonisekolah.index',[
          'testimonisekolah' => TestimoniSekolah::get(),
        ]);
    }
}
