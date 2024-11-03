<?php

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
        Schema::create('dudis', function (Blueprint $table) {
            $table->id();
            $table->string('idt')->unique();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->string('kota');
            $table->text('alamat');
            $table->string('logo')->default('logo-dudi.jpg');
            $table->timestamps();
            // $table->softDeletes();
            $table->boolean('is_delete')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dudis');
    }
};
