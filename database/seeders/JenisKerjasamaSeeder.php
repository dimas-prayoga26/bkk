<?php

namespace Database\Seeders;

use App\Models\JenisKerjasama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKerjasamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
          [ 'name' => 'Pratik Kerja Lapangan' ],
          [ 'name' => 'Kunjungan Industri' ],
          [ 'name' => 'Penguji UKK' ],
          [ 'name' => 'Sinkronisasi Kurikulum' ],
        ])->each(fn($q) => JenisKerjasama::create($q));
    }
}
