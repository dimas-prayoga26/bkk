<?php

namespace Database\Seeders;

use App\Helpers\DummyHelper;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
          'name' => 'Admin Sekolah',
          'email' => 'adminsekolah@gmail.com',
          'password' => 'password',
          'tempatlahir' => DummyHelper::randKota(),
          'tanggallahir' => DummyHelper::randTanggalLahir(),
          'telepon' => DummyHelper::randTelepon(),
          'jk' => DummyHelper::randJK(),
          'alamat' => DummyHelper::randAlamat(),
          'role' => 'admin',
        ],
        [
          'name' => 'Admin DUDI',
          'email' => 'admindudi@gmail.com',
          'password' => 'password',
          'tempatlahir' => DummyHelper::randKota(),
          'tanggallahir' => DummyHelper::randTanggalLahir(),
          'telepon' => DummyHelper::randTelepon(),
          'jk' => DummyHelper::randJK(),
          'alamat' => DummyHelper::randAlamat(),
          'role' => 'admin',
        ],
        [
          'name' => 'Pelamar Umum, S.T., M.T',
          'email' => 'pelamarumum@gmail.com',
          'password' => 'password',
          'tempatlahir' => DummyHelper::randKota(),
          'tanggallahir' => DummyHelper::randTanggalLahir(),
          'telepon' => DummyHelper::randTelepon(),
          'jk' => DummyHelper::randJK(),
          'alamat' => DummyHelper::randAlamat(),
          'role' => 'pelamar',
        ],
        [
          'name' => 'Pelamar Alumni',
          'email' => 'pelamaralumni@gmail.com',
          'password' => 'password',
          'tempatlahir' => DummyHelper::randKota(),
          'tanggallahir' => DummyHelper::randTanggalLahir(),
          'telepon' => DummyHelper::randTelepon(),
          'jk' => DummyHelper::randJK(),
          'alamat' => DummyHelper::randAlamat(),
          'role' => 'pelamar',
        ],
        ])->each(fn($q) => User::create($q));
    }
}
