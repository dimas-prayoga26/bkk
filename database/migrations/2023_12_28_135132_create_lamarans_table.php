<?php

use App\Models\Loker;
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
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id();
            $table->string('idt')->unique();
            $table->foreignIdFor(Pelamar::class)->constrained('pelamars')->onDelete('cascade');
            $table->foreignIdFor(Loker::class)->constrained('lokers')->onDelete('cascade');
            $table->date('tanggalwawancara')->nullable();
            $table->enum('status', ['belum','proses','lolos','tidaklolos', 'wawancara'])->default('belum');
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
        Schema::dropIfExists('lamarans');
    }
};
