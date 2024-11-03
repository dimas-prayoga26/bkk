<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Dudi;
use App\Models\Lamaran;
use App\Models\Loker;
use App\Models\Postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Pow;

class BerandaController extends Controller
{
    public function __invoke()
    {
      if (Auth::check() && Auth::user()->isAdmin()) {
        return redirect(route('manage.dashboard.index'));
      } else {
          return view('pages.users.home.index', [
              'postingan' => Postingan::where('status', 'public')->limit(3)->with('admin.user:id,name')->orderBy('tanggal', 'desc')->get(),
              'loker' => Loker::where('status', 'buka')->limit(3)->with('dudi')->orderBy('tanggal_diunggah', 'desc')->get(),
              'countDudi' => Dudi::notdelete()->count(),
              'countAlumni' => Alumni::count(),
              'countLoker' => Loker::count(),
          ]);
      }
    }
}
