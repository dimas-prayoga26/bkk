<?php

namespace Database\Factories;

use App\Helpers\DummyHelper;
use App\Models\Dudi;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
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
          'email' => $this->faker->email,
          'password' => 'password',
          'tempatlahir' => DummyHelper::randKota(),
          'tanggallahir' => DummyHelper::randTanggalLahir(),
          'telepon' => DummyHelper::randTelepon(),
          'jk' => DummyHelper::randJK(),
          'alamat' => DummyHelper::randAlamat(),
          'role' => 'admin',
          'is_aktif' => $this->faker->randomElement(['1','0']),
        ]);

        $type = $this->faker->randomElement(['sekolah', 'dudi']);
        return [
          'user_id' => $user->id,
          'type' => $type,
          'dudi_id' => $type == 'dudi' ? Dudi::inRandomOrder()->first()->id : null,
          'is_delete' => $this->faker->randomElement([1,0]),
        ];
    }
}
