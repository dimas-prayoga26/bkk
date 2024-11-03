<?php

namespace Database\Factories;

use App\Helpers\DummyHelper;
use App\Helpers\IdtHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dudi>
 */
class DudiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
      $companyName = $this->faker->company;

      return [
          'name' => $companyName,
          'email' => $this->faker->email(),
          'telepon' => DummyHelper::randTelepon(),
          'kota' => DummyHelper::randKota(),
          'alamat' => $this->faker->address,
          'idt' => IdtHelper::idtDudi($companyName),
          'is_delete' => $this->faker->randomElement([0]),
      ];
    }
}
