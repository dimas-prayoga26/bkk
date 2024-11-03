<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function pelamar(){
      return $this->belongsTo(Pelamar::class);
    }

    public function angkatan(){
      return $this->belongsTo(Angkatan::class);
    }

    public function jurusan(){
      return $this->belongsTo(Jurusan::class);
    }

    public function kegiatan(){
      return $this->belongsTo(Kegiatan::class);
    }
}
