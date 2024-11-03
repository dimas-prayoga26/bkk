<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lamaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName() { //routeModelBindings
      return 'idt';
    }

    public function pelamar(){
      return $this->belongsTo(Pelamar::class);
    }

    public function loker(){
      return $this->belongsTo(Loker::class);
    }
}
