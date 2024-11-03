<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\JenisKerjasama;
use App\Models\Jurusan;
use App\Models\Kegiatan;
use App\Models\Visimisi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TentangSeeder::class);
        $this->call(VisimisiSeeder::class);
        $this->call(JenisKerjasamaSeeder::class);
        \App\Models\Dudi::factory(30)->create();
        \App\Models\Kerjasama::factory(50)->create();
        $this->call(AngkatanSeeder::class);
        $this->call(JurusanSeeder::class);
        $this->call(KegiatanSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(PelamarSeeder::class);
        \App\Models\Admin::factory(50)->create();
        \App\Models\Berkas::factory(1000)->create();
        $this->call(AlumniSeeder::class);
        \App\Models\Loker::factory(50)->create();
        \App\Models\Lamaran::factory(200)->create();
        \App\Models\Postingan::factory(50)->create();
        \App\Models\TestimoniSekolah::factory(10)->create();
    }
}
