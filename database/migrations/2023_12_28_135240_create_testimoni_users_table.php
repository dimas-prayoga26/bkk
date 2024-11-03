<?php

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
        Schema::create('testimoni_users', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pelamar::class)->constrained('pelamars')->onDelete('cascade');
            $table->text('keterangan');
            $table->enum('status',['public','private']);
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
        Schema::dropIfExists('testimoni_users');
    }
};
