<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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
           'name' => 'admin',
          ],
          [
           'name' => 'user',
          ],
        ])->each(fn($q) => Role::create($q));
    }
}
