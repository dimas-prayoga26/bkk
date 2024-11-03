<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName() { //routeModelBindings
      return 'idt';
    }

    public function admin(){
      return $this->belongsTo(Admin::class);
    }
}
