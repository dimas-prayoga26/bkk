<?php

namespace Database\Factories;

use App\Helpers\IdtHelper;
use App\Models\Loker;
use App\Models\Pelamar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lamaran>
 */
class LamaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'idt' => IdtHelper::idtLamaran(),
          'pelamar_id' => Pelamar::inRandomOrder()->first()->id,
          'loker_id' => Loker::inRandomOrder()->first()->id,
          'status' => $this->faker->randomElement(['belum','proses','lolos','tidaklolos', 'wawancara']),
          'tanggalwawancara' => $this->faker->randomElement([null, $this->faker->date]),
        ];
    }
}
