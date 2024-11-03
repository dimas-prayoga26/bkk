<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName() { //routeModelBindings
      return 'idt';
    }

    public function admin(){
      return $this->belongsTo(Admin::class);
    }

    public function dudi(){
      return $this->belongsTo(Dudi::class);
    }

    public function lamaran(){
      return $this->hasMany(Lamaran::class);
    }

    public function kualifikasi_pendidikan() {
      if ($this->kual_pend == 'sd') {
        return 'SD/MI/Sederajat';
      } else if ($this->kual_pend == 'smp') {
        return 'SMP/MTs/Sederajat';
      } else if ($this->kual_pend == 'sma') {
        return 'SMA/SMK/Sederajat';
      } else if ($this->kual_pend == 'd3') {
        return 'Diploma III';
      } else if ($this->kual_pend == 's1') {
        return 'Sarjana I';
      }
    }
}
