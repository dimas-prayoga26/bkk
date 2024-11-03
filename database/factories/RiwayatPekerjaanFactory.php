<?php

namespace Database\Factories;

use App\Helpers\DummyHelper;
use App\Models\Pelamar;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RiwayatPekerjaan>
 */
class RiwayatPekerjaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'pelamar_id' => Pelamar::inRandomOrder()->first()->id,
            // 'pelamar_id' => function () {
            //                       return factory(Pelamar::class)->create()->id;
            //                   },
            'nama_dudi' => $this->faker->company,
            'mulai' => DummyHelper::randTanggal(),
            'selesai' => DummyHelper::randTanggal(),
            'posisi' => $this->faker->jobTitle,
        ];
    }
}
