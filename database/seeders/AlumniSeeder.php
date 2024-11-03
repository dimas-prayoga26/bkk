<?php

namespace Database\Seeders;

use App\Models\Alumni;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alumni::create([
          'pelamar_id' => 2,
          'angkatan_id' => 1,
          'jurusan_id' => 1,
          'kegiatan_id' => 2,
          'relevan' => true,
          'pekerjaan' => 'Programmer',
          'tahun_mulai' => '2023',
          'nama_dudi' => 'PT. ALVARO',
          'bidang_dudi' => 'Informatika',
          'alamat_dudi' => 'Tasikmalaya',
          'penghasilan' => 'Rp5.000.000-7.500.000',
        ]);
    }
}
