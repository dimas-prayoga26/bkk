<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
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
            'user_id' => 1,
            'dudi_id' => null,
            'type' => 'sekolah',
          ],
          [
            'user_id' => 2,
            'dudi_id' => 1,
            'type' => 'dudi',
          ]
        ])->each(fn($q) => Admin::create($q));
    }
}
