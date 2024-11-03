<?php

namespace Database\Factories;

use App\Helpers\DummyHelper;
use App\Helpers\IdtHelper;
use App\Models\Admin;
use App\Models\Dudi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loker>
 */
class LokerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $judul = $this->faker->sentence();
        return [
          'idt' => IdtHelper::idtLoker($judul),
          'admin_id' => Admin::inRandomOrder()->first()->id,
          'dudi_id' => Dudi::inRandomOrder()->first()->id,
          'info' => $this->faker->randomElement(['internal','eksternal']),
          'status' => $this->faker->randomElement(['buka','tutup']),
          'tanggal_diunggah' => DummyHelper::randTanggal(),
          'tanggal_batas' => DummyHelper::randTanggal(),
          'posisi' => $this->faker->jobTitle(),
          'kual_pend' => $this->faker->randomElement(['sd','smp','sma','d3','s1']),
          'kual_jurusan' => $this->faker->word,
          'judul' => $judul,
          'isi' => $this->faker->paragraph(),
        ];
    }
}
