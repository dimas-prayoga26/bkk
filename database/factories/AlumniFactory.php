<?php

namespace Database\Factories;

use App\Models\Angkatan;
use App\Models\Jurusan;
use App\Models\Kegiatan;
use App\Models\Pelamar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumni>
 */
class AlumniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          // 'pelamar_id' => Pelamar::where('type', 'alumni')->inRandomOrder()->first()->id,
          // 'pelamar_id' => function () {
          //                   return factory(Pelamar::class)->create()->id;
          //               },
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
        ];
    }
}
