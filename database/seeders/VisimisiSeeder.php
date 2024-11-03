<?php

namespace Database\Seeders;

use App\Models\Visimisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisimisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visimisi::create([
          'isi' => '<h3>Visi BKK SMKN 1 INDONESIA</h3> <br> <p>Terwujudnya Bursa Kerja Khusus (BKK) yang mampu menjembatani pencari danpemberi kerja serta menyalurkan tamatan yang dapat memenuhi tuntutan kebutuhan Usaha dan Industri memasuki Era Global.</p> <br> <h3>MISI BKK SMKN 1 INDONESIA</h3> <br> <ol> <li>Menjadi pusat informasi lowongan pekerjaan yang aktual bagi siswa dan alumni SMKN 1 INDONESIA</li> <li>Menjalin kerjasama dengan Dunia Usaha/Industri untuk mengadakan pelatihan dan rekrutmen tenaga kerja bagi siswa dan alumni.</li> <li>Memberikan pelayanan berkualitas terhadap alumni melalui pendataan lulusan dan keterserapan tenaga kerja.</li> <li>Menyalurkan para tamatan SMKN 1 INDONESIA sesuai dengan kompetensi keahlian yang dibutuhkan dunia usaha dan dunia industri.</li> </ol>'
        ]);
    }
}
