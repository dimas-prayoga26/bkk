<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DummyHelper
{
    public static function randTanggalLahir(){
        return date('Y-m-d', rand(strtotime('1970-01-01'), strtotime('2005-12-31')));
    }

    public static function randTanggal(){
      return date('Y-m-d', rand(strtotime('2023-01-01'), strtotime('2023-12-31')));
  }

    public static function randJK(){
      return ['l', 'p'][array_rand(['l', 'p'])];
    }

    public static function randTelepon(){
        return '08' . str_pad(rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
    }

    public static function randKota(){
        return ['Jakarta', 'Bekasi', 'Bogor', 'Depok', 'Tangerang', 'Yogyakarta'][array_rand(['Jakarta', 'Bekasi', 'Bogor', 'Depok', 'Tangerang', 'Yogyakarta'])];
    }

    public static function randAlamat(){
        return ['Jl. Indonesia No.17', 'Jl. Mekarsari No.13', 'Jl. HZ Mustofa', 'Jl. Pegangsaan Timur'][array_rand(['Jl. Indonesia No.17', 'Jl. Mekarsari No.13', 'Jl. HZ Mustofa', 'Jl. Pegangsaan Timur'])];
    }

    public static function randNik(){
      return '8' . str_pad(rand(0, 9999999999), 16, '0', STR_PAD_LEFT);
    }

}
