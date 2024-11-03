<?php

namespace Database\Seeders;

use App\Helpers\DummyHelper;
use App\Helpers\IdtHelper;
use App\Models\Alumni;
use App\Models\Berkas;
use App\Models\Pelamar;
use App\Models\RiwayatPekerjaan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      collect([
        [
          'idt' => IdtHelper::idtPelamar(User::find(3)->name),
          'user_id' => 3,
          'type' => 'umum',
          'nik' => '312312321421',
          'pend_terakhir' => 'SMK',
          'jurusan_terakhir' => 'RPL',
          'tahun_lulus' => '2023',
        ],
        [
          'idt' => IdtHelper::idtPelamar(User::find(4)->name),
          'user_id' => 4,
          'type' => 'alumni',
          'nik' => '312312321422',
          'pend_terakhir' => 'SMK',
          'jurusan_terakhir' => 'AKL',
          'tahun_lulus' => '2022',
        ],
      ])->each(fn($q) => Pelamar::create($q));

      // collect([
      //   ['pelamar_id' => 1],
      //   ['pelamar_id' => 2],
      // ])->each(fn($q) => RiwayatPekerjaan::create($q));

      collect([
        ['pelamar_id' => 1],
        ['pelamar_id' => 2],
      ])->each(fn($q) => Berkas::create($q));

      // collect([
      //   ['pelamar_id' => 2],
      // ])->each(fn($q) => Alumni::create($q));
    }
}
