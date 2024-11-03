<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerjasama extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function dudi(){
      return $this->belongsTo(Dudi::class);
    }

    public function jenisKerjasama(){
      return $this->belongsTo(JenisKerjasama::class);
    }

}
