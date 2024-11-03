<?php

use App\Models\Admin;
use App\Models\Dudi;
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
        Schema::create('lokers', function (Blueprint $table) {
            $table->id();
            $table->string('idt')->unique();
            $table->foreignIdFor(Admin::class)->constrained('admins')->onDelete('cascade');
            $table->foreignIdFor(Dudi::class)->constrained('dudis')->onDelete('cascade');
            $table->enum('status',['buka','tutup']);
            $table->date('tanggal_diunggah');
            $table->date('tanggal_batas');
            $table->enum('kual_pend',['sd','smp','sma','d3','s1']);
            $table->string('kual_jurusan')->nullable();
            $table->string('judul');
            $table->string('posisi');
            $table->text('isi');
            $table->string('cover')->default('cover-loker.jpg');
            $table->enum('info',['internal','eksternal']);
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
        Schema::dropIfExists('lokers');
    }
};
