<?php

namespace Database\Factories;

use App\Helpers\DummyHelper;
use App\Helpers\IdtHelper;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Postingan>
 */
class PostinganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $judul =$this->faker->sentence();
        return [
          'idt' => IdtHelper::idtPostingan($judul),
          'admin_id' => Admin::inRandomOrder()->first()->id,
          'status' => $this->faker->randomElement(['public','private']),
          'kategori' => $this->faker->randomElement(['pengumuman','artikel','berita']),
          'tanggal' => DummyHelper::randTanggal(),
          'judul' => $judul,
          'isi' => $this->faker->paragraph(),
          'excerpt' => $this->faker->paragraph() . '...',
        ];
    }
}
