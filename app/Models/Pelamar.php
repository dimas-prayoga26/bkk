<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pelamar extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($pelamar) {
          $pelamar->idt =  Str::slug(str_replace('.', '', $pelamar->user->name), '-') . '-' . time() . Str::random(5);
        });
    }

    public function getRouteKeyName() { //routeModelBindings
      return 'idt';
    }

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function riwayatPekerjaan(){
      return $this->hasOne(RiwayatPekerjaan::class);
    }

    public function berkas(){
      return $this->hasOne(Berkas::class);
    }

    public function alumni(){
      return $this->hasOne(Alumni::class);
    }

    public function lamaran(){
      return $this->hasMany(Lamaran::class);
    }

    public function testimoniUser(){
      return $this->hasOne(TestimoniUser::class);
    }
}
