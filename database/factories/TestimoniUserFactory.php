<?php

namespace Database\Factories;

use App\Models\Pelamar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TestimoniUser>
 */
class TestimoniUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'pelamar_id' => Pelamar::inRandomOrder()->first()->id,
          'keterangan' => $this->faker->sentence(),
          'status' => $this->faker->randomElement(['public','private']),
        ];
    }
}
