<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password) {
      $this->attributes['password'] = bcrypt($password);
    }

    public function admin(){
      return $this->hasOne(Admin::class);
    }

    public function pelamar(){
      return $this->hasOne(Pelamar::class);
    }


    // PERMISSION
    public function isAdmin(){
      return $this->role == 'admin';
    }

    public function isAdminSekolah(){
      return $this->role == 'admin' && $this->admin->type == 'sekolah';
    }

    public function isAdminDudi(){
      return $this->role == 'admin' && $this->admin->type == 'dudi';
    }

    public function isPelamar(){
      return $this->role == 'pelamar';
    }

    public function isPelamarUmum(){
      return $this->role == 'pelamar' && $this->pelamar->type == 'umum';
    }

    public function isPelamarAlumni(){
      return $this->role == 'pelamar' && $this->pelamar->type == 'alumni';
    }

    // HELPER
    public function isAktif() {
      return $this->is_aktif == '1';
    }

    public function notAktif() {
      return $this->is_aktif == '0';
    }

    public function is_aktif() {
      return $this->is_aktif == '1' ? '<span class="badge badge-lg badge-light-success">AKTIF</span>' : '<span class="badge badge-lg badge-light-danger">NON-AKTIF</span>';
    }

    public function ttl() {
      if ($this->tempatlahir != null && $this->tanggallahir != null) {
        return $this->tempatlahir . ', ' . Carbon::parse($this->tanggallahir)->isoFormat('D MMMM Y', 'Do MMMM Y');
      } elseif ($this->tempatlahir != null && $this->tanggallahir == null){
        return $this->tempatlahir;
      } elseif ($this->tempatlahir == null && $this->tanggallahir != null){
        return Carbon::parse($this->tanggallahir)->isoFormat('D MMMM Y', 'Do MMMM Y');
      } else {
        return '-';
      }
    }

    public function jk() {
      if ($this->jk == 'l') {
        return 'Laki-Laki';
      } elseif ($this->jk == 'p') {
        return 'Perempuan';
      } else {
        return '-';
      }
    }
}
