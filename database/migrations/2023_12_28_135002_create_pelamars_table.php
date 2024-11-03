<?php

use App\Models\User;
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
        Schema::create('pelamars', function (Blueprint $table) {
            $table->id();
            $table->string('idt')->unique();
            $table->foreignIdFor(User::class)->constrained('users')->onDelete('cascade');
            $table->enum('type',['umum','alumni']);
            $table->string('nik')->unique()->nullable();
            $table->string('pend_terakhir')->nullable();
            $table->string('jurusan_terakhir')->nullable();
            $table->string('tahun_lulus')->nullable();
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
        Schema::dropIfExists('pelamars');
    }
};
