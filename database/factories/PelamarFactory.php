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
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelamar>
 */
class PelamarFactory extends Factory
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

        return [
          'idt' => IdtHelper::idtPelamar($user->name),
          'user_id' => $user->id,
          'type' => $this->faker->randomElement(['umum','alumni']),
          // 'type' => $type,
          'nik' => $this->faker->unique()->numerify('################'),
          'pend_terakhir' => $this->faker->randomElement(['sd','smp', 'smk', 'd3', 's1']),
          'jurusan_terakhir' => Jurusan::inRandomOrder()->first()->name,
          'tahun_lulus' => Angkatan::inRandomOrder()->first()->tahun,
        ];

    }
}
