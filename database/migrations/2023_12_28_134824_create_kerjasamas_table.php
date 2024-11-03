<?php

use App\Models\Dudi;
use App\Models\JenisKerjasama;
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
        Schema::create('kerjasamas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Dudi::class)->constrained('dudis')->onDelete('cascade');
            $table->foreignIdFor(JenisKerjasama::class)->constrained('jenis_kerjasamas')->onDelete('cascade');
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
        Schema::dropIfExists('kerjasamas');
    }
};
