<?php

namespace Database\Seeders;

use App\Models\Angkatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AngkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
          [ 'tahun' => '2016' ],
          [ 'tahun' => '2017' ],
          [ 'tahun' => '2018' ],
          [ 'tahun' => '2019' ],
          [ 'tahun' => '2020' ],
          [ 'tahun' => '2021' ],
          [ 'tahun' => '2022' ],
          [ 'tahun' => '2023' ],
        ])->each(fn($q) => Angkatan::create($q));
    }
}
