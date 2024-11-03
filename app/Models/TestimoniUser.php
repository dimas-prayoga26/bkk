<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimoniUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pelamar(){
      return $this->belongsTo(Pelamar::class);
    }
}
