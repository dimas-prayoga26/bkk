<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\BerandaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::loginUsingId(2);

Route::get('/', BerandaController::class)->name('home');

Route::get('/forgot-password', function (){
  return view('pages.auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'mailSend'])->name('password.email');

Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
Route::get('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
Route::get('/email', function (){
  return view('email.emailInformation');
})->name('reset-password');

Route::middleware('guest')->group(function(){
  Route::get('/login', [AuthController::class, 'index'])->name('login');
  Route::post('/login', [AuthController::class, 'cekLogin'])->name('login');
  Route::get('/register', [AuthController::class, 'register'])->name('register');
  Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// USER/GUEST
Route::name('user.')->group(function(){ // prefix route name: ex=user.loker.index
  Route::get('/tentang', App\Http\Controllers\User\TentangController::class)->name('tentang.index');
  Route::get('/visimisi', App\Http\Controllers\User\VisimisiController::class)->name('visimisi.index');
  Route::get('/tracer', App\Http\Controllers\User\TracerController::class)->name('tracer.index');
  Route::get('/dudi', App\Http\Controllers\User\DudiController::class)->name('dudi.index');
  Route::resource('/loker', App\Http\Controllers\User\LokerController::class);
  Route::resource('/postingan', App\Http\Controllers\User\PostinganController::class);
  Route::get('/testimonisekolah', App\Http\Controllers\User\TestimoniSekolahController::class)->name('testimonisekolah.index');

  Route::prefix('/pelamar')->middleware(['can:pelamar','auth'])->group(function(){
    Route::get('/{pelamar}/edit/{endpoint}', [App\Http\Controllers\User\PelamarController::class, 'edit'])->name('pelamar.edit');
    Route::put('/{pelamar}/{endpoint}', [App\Http\Controllers\User\PelamarController::class, 'update'])->name('pelamar.update');
    Route::get('/{pelamar}/deletefoto', [App\Http\Controllers\User\PelamarController::class, 'deleteFoto'])->name('pelamar.deletefoto');
    Route::post('/{pelamar}/riwayatkerja', [App\Http\Controllers\User\PelamarController::class, 'storeRiwayatKerja'])->name('pelamar.riwayatkerja.store'); //store riwayatkerja
    Route::get('/{riwayatkerja}/riwayatkerja', [App\Http\Controllers\User\PelamarController::class, 'editRiwayatKerja'])->name('pelamar.riwayatkerja.edit'); //edit riwayatkerja
    Route::put('/{riwayatkerja}/riwayatkerja/update', [App\Http\Controllers\User\PelamarController::class, 'updateRiwayatKerja'])->name('pelamar.riwayatkerja.update'); //update riwayatkerja
    Route::delete('/{riwayatkerja}/riwayatkerja', [App\Http\Controllers\User\PelamarController::class, 'destroyRiwayatKerja'])->name('pelamar.riwayatkerja.delete'); //hapus riwayatkerja
    Route::delete('/{pelamar}/berkas/{endpoint}', [App\Http\Controllers\User\PelamarController::class, 'destroyBerkas'])->name('pelamar.berkas.delete'); //hapus riwayatkerja
    Route::get('/{pelamar}/printbiodata', [App\Http\Controllers\User\PelamarController::class, 'printBiodata'])->name('pelamar.print.biodata');
    Route::get('/{pelamar}/printalumni', [App\Http\Controllers\User\PelamarController::class, 'printAlumni'])->name('pelamar.print.alumni');
  });

});

// ADMIN
Route::name('manage.')->prefix('/manage')->middleware(['auth','can:admin'])->group(function(){ // prefix route name: ex=manage.loker.index
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

  Route::middleware('can:adminsekolah')->group(function(){
    Route::resource('/tentang', App\Http\Controllers\Admin\TentangController::class); // tentang BKK
    Route::resource('/visimisi', App\Http\Controllers\Admin\VisimisiController::class);
    Route::resource('/angkatan', App\Http\Controllers\Admin\AngkatanController::class);
    Route::resource('/jurusan', App\Http\Controllers\Admin\JurusanController::class);
    Route::resource('/kegiatan', App\Http\Controllers\Admin\KegiatanController::class);
    Route::get('/tracer', [App\Http\Controllers\Admin\TracerController::class, 'index'])->name('tracer.index');
    Route::get('/tracer/print', [App\Http\Controllers\Admin\TracerController::class, 'print'])->name('tracer.print');
    Route::resource('/postingan', App\Http\Controllers\Admin\PostinganController::class);
    Route::resource('/admin', App\Http\Controllers\Admin\AdminController::class);
    Route::get('/pelamar/print', [App\Http\Controllers\Admin\PelamarController::class, 'print'])->name('pelamar.print');
    Route::resource('/pelamar', App\Http\Controllers\Admin\PelamarController::class)->except(['edit','update']);

    Route::resource('/kerjasama', App\Http\Controllers\Admin\KerjasamaController::class);
    Route::resource('/testimonisekolah', App\Http\Controllers\Admin\TestimoniSekolahController::class);
  });

  Route::prefix('/pelamar')->group(function(){
    Route::get('/{pelamar}/edit/{endpoint}', [App\Http\Controllers\Admin\PelamarController::class, 'edit'])->name('pelamar.edit');
    Route::put('/{pelamar}/{endpoint}', [App\Http\Controllers\Admin\PelamarController::class, 'update'])->name('pelamar.update');
    Route::get('/{pelamar}/deletefoto', [App\Http\Controllers\Admin\PelamarController::class, 'deleteFoto'])->name('pelamar.deletefoto');
    Route::post('/{pelamar}/riwayatkerja', [App\Http\Controllers\Admin\PelamarController::class, 'storeRiwayatKerja'])->name('pelamar.riwayatkerja.store'); //store riwayatkerja
    Route::get('/{riwayatkerja}/riwayatkerja', [App\Http\Controllers\Admin\PelamarController::class, 'editRiwayatKerja'])->name('pelamar.riwayatkerja.edit'); //edit riwayatkerja
    Route::put('/{riwayatkerja}/riwayatkerja/update', [App\Http\Controllers\Admin\PelamarController::class, 'updateRiwayatKerja'])->name('pelamar.riwayatkerja.update'); //update riwayatkerja
    Route::delete('/{riwayatkerja}/riwayatkerja', [App\Http\Controllers\Admin\PelamarController::class, 'destroyRiwayatKerja'])->name('pelamar.riwayatkerja.delete'); //hapus riwayatkerja
    Route::delete('/{pelamar}/berkas/{endpoint}', [App\Http\Controllers\Admin\PelamarController::class, 'destroyBerkas'])->name('pelamar.berkas.delete'); //hapus riwayatkerja
    Route::get('/{pelamar}/printbiodata', [App\Http\Controllers\Admin\PelamarController::class, 'printBiodata'])->name('pelamar.print.biodata');
    Route::get('/{pelamar}/printalumni', [App\Http\Controllers\Admin\PelamarController::class, 'printAlumni'])->name('pelamar.print.alumni');
  });

  Route::resource('/dudi', App\Http\Controllers\Admin\DudiController::class); // data terbatas tergantung role admin
  Route::resource('/loker', App\Http\Controllers\Admin\LokerController::class); // data terbatas tergantung role admin
  Route::resource('/lamaran', App\Http\Controllers\Admin\LamaranController::class)->only(['index','update']); // data terbatas tergantung role admin
  Route::get('/lamaran/print', [App\Http\Controllers\Admin\LamaranController::class, 'print'])->name('lamaran.print');

  Route::prefix('/profile')->group(function(){
    Route::get('/home', [ProfileController::class, 'home'])->name('profile.home');
    Route::get('/pengaturan', [ProfileController::class, 'pengaturan'])->name('profile.pengaturan');
    Route::put('/pengaturan', [ProfileController::class, 'pengaturanUpdate'])->name('profile.pengaturan');
    Route::get('/editfoto', [ProfileController::class, 'editFoto'])->name('profile.editfoto');
    Route::put('/editfoto', [ProfileController::class, 'updateFoto'])->name('profile.editfoto');
    Route::get('/deletefoto', [ProfileController::class, 'deleteFoto'])->name('profile.deletefoto');
  });

});
