<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      collect([
        [
           'name' => 'Teknik Kendaraan Ringan dan Otomotif',
           'singkatan' => 'TKRO',
        ],
        [
           'name' => 'Teknik Pendingin Tata Udara',
           'singkatan' => 'TPTU',
        ],
        [
           'name' => 'Teknik Komputer Jaringan dan Telekomunikasi',
           'singkatan' => 'TKJTel',
        ],
      ])->each(fn($q) => Jurusan::create($q));
    }
}
