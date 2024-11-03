<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKerjasama extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kerjasama(){
      return $this->hasMany(Kerjasama::class);
    }
}
