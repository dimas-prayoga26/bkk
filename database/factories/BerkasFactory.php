<?php

namespace Database\Factories;

use App\Helpers\DummyHelper;
use App\Helpers\IdtHelper;
use App\Models\Alumni;
use App\Models\Angkatan;
use App\Models\Berkas;
use App\Models\Jurusan;
use App\Models\Kegiatan;
use App\Models\Pelamar;
use App\Models\RiwayatPekerjaan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berkas>
 */
class BerkasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
      $user = User::create([
        'name' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail,
        'password' => 'password',
        'tempatlahir' => DummyHelper::randKota(),
        'tanggallahir' => DummyHelper::randTanggalLahir(),
        'telepon' => DummyHelper::randTelepon(),
        'jk' => DummyHelper::randJK(),
        'alamat' => DummyHelper::randAlamat(),
        'role' => 'pelamar',
        'is_aktif' => $this->faker->randomElement(['1','0']),
      ]);

      $pelamar = Pelamar::create([
        'idt' => IdtHelper::idtPelamar($user->name),
        'user_id' => $user->id,
        'type' => $this->faker->randomElement(['umum','alumni']),
        // 'type' => $type,
        'nik' => $this->faker->unique()->numerify('################'),
        'pend_terakhir' => $this->faker->randomElement(['sd','smp', 'smk', 'd3', 's1']),
        'jurusan_terakhir' => Jurusan::inRandomOrder()->first()->name,
        'tahun_lulus' => Angkatan::inRandomOrder()->first()->tahun,
      ]);

      if ($pelamar->type == 'alumni') {
        Alumni::create([
          'pelamar_id' => $pelamar->id,
          'angkatan_id' => Angkatan::inRandomOrder()->first()->id,
          'jurusan_id' => Jurusan::inRandomOrder()->first()->id,
          'kegiatan_id' => Kegiatan::inRandomOrder()->first()->id,
          'relevan' => $this->faker->randomElement([true,false]),
          'pekerjaan' => $this->faker->jobTitle(),
          'tahun_mulai' => Angkatan::inRandomOrder()->first()->tahun,
          'nama_dudi' => $this->faker->randomElement([null,$this->faker->company()]),
          'bidang_dudi' => $this->faker->word,
          'alamat_dudi' => $this->faker->address(),
          'penghasilan' => $this->faker->randomElement([
            null,
            'Rp.1.000.000',
            'Rp.2.000.000',
            'Rp.3.000.000',
            'Rp.4.000.000',
            'Rp.5.000.000',
          ]),
        ]);
      }

      collect([
        [
          'pelamar_id' => $pelamar->id,
          'nama_dudi' => $this->faker->company,
          'mulai' => DummyHelper::randTanggal(),
          'selesai' => DummyHelper::randTanggal(),
          'posisi' => $this->faker->jobTitle,
        ],
        [
          'pelamar_id' => $pelamar->id,
          'nama_dudi' => $this->faker->company,
          'mulai' => DummyHelper::randTanggal(),
          'selesai' => DummyHelper::randTanggal(),
          'posisi' => $this->faker->jobTitle,
        ],
      ])->each(fn($q) => RiwayatPekerjaan::create($q));

        return [
          'pelamar_id' => $pelamar->id,
          // 'pelamar_id' => Pelamar::inRandomOrder()->first()->id,
        ];
    }
}
