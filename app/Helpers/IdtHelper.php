<?php

namespace App\Helpers;

use App\Models\Lamaran;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdtHelper
{
  public static function idtPostingan($title){
    return Str::slug($title, '-') . '-' . time() . Str::random(5);
  }

  public static function idtLoker($title){
    return Str::slug($title, '-') . '-' . time() . Str::random(5);
  }

  public static function idtLamaran(){
    return Str::random(10) . time() ;
  }

  public static function idtDudi($name){
    return Str::slug(str_replace('.', '', $name), '-') . '-' . time() . Str::random(5);
  }

  public static function idtPelamar($name){
    return Str::slug(str_replace('.', '', $name), '-') . '-' . time() . Str::random(5);
  }
}
