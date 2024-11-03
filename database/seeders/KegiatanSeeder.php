<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      collect([
        [ 'name' => 'Mencari Kerja' ],
        [ 'name' => 'Bekerja' ],
        [ 'name' => 'Berwirausaha' ],
        [ 'name' => 'Berencana Kuliah' ],
        [ 'name' => 'Kuliah' ],
      ])->each(fn($q) => Kegiatan::create($q));
    }
}
