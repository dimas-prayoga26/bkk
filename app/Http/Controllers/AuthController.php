<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alumni;
use App\Models\Berkas;
use App\Models\Pelamar;
use App\Helpers\IdtHelper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\ResetPasswordEmail;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
  public function index()
  {
    return view('pages.auth.login');
  }

  public function cekLogin(Request $request)
  {
    $input = $request->validate([
      'email' => ['required'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($input)) {
        if (Auth::user()->isAktif()) {
          if (Auth::user()->role == 'admin') {
            return redirect(route('manage.dashboard.index'))->withInfo('Anda berhasil masuk!');
          } else {
            return redirect(route('home'))->withInfo('Anda berhasil masuk!');
          }
        } else {
          Auth::logout();
          return back()->withWarning('Akun anda tidak aktif!');
        }
    } else {
      return back()->withWarning('Email atau password salah!');
    }
  }

  public function register(){
    return view('pages.auth.register');
  }

  public function storeRegister(Request $request) {
    $request->validate([
      'name' => 'required',
      'tempatlahir' => 'required',
      'tanggallahir' => 'required|date',
      'telepon' => 'required',
      'alamat' => 'required',
      'type' => 'required',
      'jk' => 'required',
      'email' => 'required|unique:users,email',
      'password' => 'required',
      'nik' => 'required|numeric|unique:pelamars,nik',
      'pend_terakhir' => 'required',
      'jurusan_terakhir' => 'required',
      'tahun_lulus' => 'required',
    ]);

    try {
      DB::beginTransaction();
        $user = User::create($request->except('type','nik','pend_terakhir','jurusan_terakhir','tahun_lulus'));
        $request['user_id'] = $user->id;
        $request['idt'] = IdtHelper::idtPelamar($request->name);
        $pelamar = Pelamar::create($request->only('type','nik','pend_terakhir','jurusan_terakhir','tahun_lulus', 'user_id', 'idt'));
        Berkas::create(['pelamar_id' => $pelamar->id]);
        if ($pelamar->type == 'alumni') Alumni::create(['pelamar_id' => $pelamar->id]);
      DB::commit();
      return redirect(route('login'))->withSuccess('Anda berhasil mendaftar! silakan Login!');
    } catch (\Throwable $th) {
      DB::rollBack();
      return back()->withInput()->withError('Gagal, silahkan coba lagi!');
    }
  }

  public function mailSend(Request $request)
    {
      $request->validate(['email' => 'required|email']);

      $user = User::where('email', $request->email)->first();

      if (!$user) {
          return back()->withErrors(['email' => __('Email tidak ditemukan.')]);
      }

      $existingToken = PasswordResetToken::where('email', $request->email)->first();
      // dd($existingToken);
      if ($existingToken) {
          // Periksa nilai is_used
          if ($existingToken->is_used) {
              $existingToken->is_used = false;
              $existingToken->save();
          }
          // Gunakan token yang ada
          $token = $existingToken->token;
          $expiredAt = $existingToken->expired_at;
      }
          // Jika tidak, buat token baru
          $token = $user->id . '-' . now()->format('Ymd') . '-' . Str::random(10);
          $expiredAt = Carbon::now()->addHours(24);
          $createdAt = Carbon::now();
          
          // dd($expiredAt);
          // Update token atau buat token baru
          PasswordResetToken::updateOrCreate(
              ['email' => $request->email],
              ['token' => $token, 'expired_at' => $expiredAt, 'created_at' => $createdAt]
          );

      Mail::to($request->email)->send(new ResetPasswordEmail($token));

      return back()->withSuccess('Permintaan Berhasil Terkirim!');
  }



  public function showResetPasswordForm($token) {
      $email = PasswordResetToken::where('token', $token)->pluck('email')->first();

      $user = User::where('email', $email)->first();
  
      return view('pages.auth.reset-password', ['token' => $token, 'email' => $email]);
  }

  public function resetPassword(Request $request)
  {
      $token = $request->token;

      $resetToken = PasswordResetToken::where('token', $token)->first();

      if (!$resetToken || $resetToken->is_used) {
          return redirect()->route('login')->with('error' ,'Token reset password tidak valid.');
      }

      if ($resetToken->expired_at && $resetToken->expired_at < Carbon::now()) {
          return redirect()->route('login')->with('error' ,'Token reset password telah kadaluarsa.');
      }

      $user = User::where('email', $request->email)->first();

      if (!$user) {
          return back()->withError(['email' => __('User tidak ditemukan.')]);
      }

      $user->password = $request->password;
      $user->save();

      $resetToken->is_used = true;
      $resetToken->used_at = Carbon::now();
      $resetToken->save();

      event(new PasswordReset($user));

      return redirect()->route('login')->withSuccess('Password anda berhasil di reset! silakan Login!');
}

  public function logout(){
    Auth::logout();
    return redirect(route('home'));
  }
}
