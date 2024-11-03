<?php

use App\Models\Angkatan;
use App\Models\Jurusan;
use App\Models\Kegiatan;
use App\Models\Pelamar;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pelamar::class)->constrained('pelamars')->onDelete('cascade');
            $table->foreignIdFor(Angkatan::class)->nullable()->constrained('angkatans')->onDelete('set null');
            $table->foreignIdFor(Jurusan::class)->nullable()->constrained('jurusans')->onDelete('set null');
            $table->foreignIdFor(Kegiatan::class)->nullable()->constrained('kegiatans')->onDelete('set null');
            $table->boolean('relevan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('tahun_mulai')->nullable();
            $table->string('nama_dudi')->nullable();
            $table->string('bidang_dudi')->nullable();
            $table->text('alamat_dudi')->nullable();
            $table->string('penghasilan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnis');
    }
};
