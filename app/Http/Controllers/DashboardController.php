<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Alumni;
use App\Models\Angkatan;
use App\Models\Dudi;
use App\Models\Jurusan;
use App\Models\Lamaran;
use App\Models\Loker;
use App\Models\Pelamar;
use App\Models\Postingan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        $user = Auth::user();
        if ($user->isAdminSekolah()) $data = array_merge($data, $this->dataAdminSekolah());
        if ($user->isAdminDudi()) $data = array_merge($data, $this->dataAdminDudi());
        return view('pages.manage.dashboard.index', compact('data'));
    }

    private function dataAdminSekolah() {
      return [
        [
          'title' => 'Data Angkatan',
          'count' => Angkatan::count(),
          'colour' => 'bg-danger',
          'route' => 'manage.angkatan.index',
          'textcolor' => 'text-gray-100',
        ],
        [
          'title' => 'Data Jurusan',
          'count' => Jurusan::count(),
          'colour' => 'bg-primary',
          'route' => 'manage.jurusan.index',
          'textcolor' => 'text-gray-100',
        ],
        [
          'title' => 'Data Admin',
          'count' => Admin::notdelete()->count(),
          'colour' => 'bg-warning',
          'route' => 'manage.admin.index',
          'textcolor' => 'text-gray-100',
        ],
        [
          'title' => 'Data Pelamar Umum',
          'count' => Pelamar::where('type', 'umum')->count(),
          'colour' => 'bg-info',
          'route' => 'manage.pelamar.index',
          'textcolor' => 'text-gray-100',
        ],
        [
          'title' => 'Data Pelamar Alumni',
          'count' => Alumni::count(),
          'colour' => 'bg-success',
          'route' => 'manage.tracer.index',
          'textcolor' => 'text-gray-100',
        ],
        [
          'title' => 'Data DU/DI',
          'count' => Dudi::notdelete()->count(),
          'colour' => 'bg-secondary',
          'route' => 'manage.dudi.index',
          'textcolor' => 'text-gray-900',
        ],
        [
          'title' => 'Data Lowongan Kerja',
          'count' => Loker::count(),
          'colour' => 'bg-light-primary',
          'route' => 'manage.loker.index',
          'textcolor' => 'text-gray-900',
        ],
        [
          'title' => 'Data Postingan',
          'count' => Postingan::count(),
          'colour' => 'bg-dark',
          'route' => 'manage.postingan.index',
          'textcolor' => 'text-gray-100',
        ],
      ];
    }

    private function dataAdminDudi() {
      return [
        [
          'title' => 'Data Lowongan Kerja',
          'count' => Loker::where('dudi_id', Auth::user()->admin->dudi_id)->count(),
          'colour' => 'bg-primary',
          'route' => 'manage.loker.index',
          'textcolor' => 'text-gray-100',
        ],
        [
          'title' => 'Data Lamaran',
          'count' => Lamaran::whereHas('loker', fn($q) => $q->where('dudi_id', Auth::user()->admin->dudi_id))->count(),
          'colour' => 'bg-success',
          'route' => 'manage.lamaran.index',
          'textcolor' => 'text-gray-100',
        ],
      ];
    }
}
