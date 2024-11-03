<?php

namespace Database\Factories;

use App\Helpers\DummyHelper;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'name' => $this->faker->name,
          'email' => $this->faker->email,
          'password' => 'password',
          'tempatlahir' => DummyHelper::randKota(),
          'tanggallahir' => DummyHelper::randTanggalLahir(),
          'telepon' => DummyHelper::randTelepon(),
          'jk' => DummyHelper::randJK(),
          'alamat' => DummyHelper::randAlamat(),
          'role' => $this->faker->randomElement(['admin','pelamar']),
          'is_aktif' => $this->faker->randomElement(['1','0']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
