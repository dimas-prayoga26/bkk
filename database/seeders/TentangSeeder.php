<?php

namespace Database\Seeders;

use App\Models\Tentang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TentangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tentang::create([
          'isi' => '<div>Bursa Kerja Khusus (BKK) adalah lembaga yang dibentuk untuk mengoptimalkan peran sekolah menengah kejuruan (SMK) dalam mengurangi pangangguran, yakni berperan dalam menyalurkan alumni/lulusan masing-masing lembaga pendidikan kejuruan khususnya SMK. Cikal bakal adanya BKK dimulai tahun 1996 dengan pelatihan pembentukan BKK di SMK, dan lembaga-lembaga pelatihan kerja oleh departemen tenaga kerja Kota Surabaya (Dinas Tenaga Kerja).&nbsp;</div><div>&nbsp;</div><div>Bursa Kerja Khusus (BKK) diharapkan menjadi kepanjangan dari Dinas Tenaga Kerja untuk mnghubungkan dengan pengguna tenaga kerja yakni Dunia Usaha/Dunia industri, yang mana masing-masing lembaga sudah mempunyai Institusi pasangan sejak adanya praktik kerja lapangan (PKL) atau Praktik Kerja Industri (PRAKERIN). Dengan demikian mempermudah pengguna untuk mencari tenaga kerja sesuai dengan bidang masing-masing, sesuai dengan kompetensi lulusan dari masing-masing SMK.&nbsp;</div><div>&nbsp;</div><div>SMK Negeri 1 sebagai salah satu SMK terkemuka di Surabaya menyambut baik kesempatan ini. Petugas yang dikirim untuk mengikuti pelatihan adalah Dra. Eny Sekar Dibyanti (guru BP/BK). Setelah pelatihan itu langsung bertugas sebagai ketua pelaksana Bursa Kerja Khusus SMKN 1 INDONESIA.&nbsp;<br>&nbsp;</div><div>Seiring dengan perkembangan jaman, fungsi BKK masih tetap, yakni membina dan menyalurkan lulusan/tamatan untuk memasuki dunia kerja, hanya persyaratan administrasi mengalami perubahan. BKK yang dulunya bisa mengeluarkan kartu pencari kerja (Kartu Kuning), sekarang ini sudah tidak diperlukan lagi. Dan tidak boleh lagi mengeluarkan kartu pencari kerja.&nbsp;<br>&nbsp;</div><div>Tahun 2012 terjadi perubahan struktur organisasi BKK SMKN 1 INDONESIA dengan diketuai oleh Siswantiningrum, S.Psy. hingga tahun 2014. Tahun 2014 s.d. sekarang yang bertindak sebagai ketua BKK adalah Drs. Abd. Aziz, SE. Koordinator BKK harus mempunyai sertifikat pelatihan pembentukan BKK yang dikeluarkan oleh Dinas Tenaga Kerja Kota Surabaya.&nbsp;</div>'
        ]);
    }
}
