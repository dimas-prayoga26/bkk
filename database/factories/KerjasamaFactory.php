<?php

namespace Database\Factories;

use App\Models\Dudi;
use App\Models\JenisKerjasama;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kerjasama>
 */
class KerjasamaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'dudi_id' => Dudi::inRandomOrder()->first()->id,
          'jenis_kerjasama_id' => JenisKerjasama::inRandomOrder()->first()->id,
        ];
    }
}
