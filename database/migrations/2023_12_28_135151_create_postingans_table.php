<?php

use App\Models\Admin;
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
        Schema::create('postingans', function (Blueprint $table) {
            $table->id();
            $table->string('idt')->unique();
            $table->text('excerpt');
            $table->foreignIdFor(Admin::class)->constrained('admins')->onDelete('cascade');
            $table->enum('status',['public','private']);
            $table->enum('kategori',['pengumuman','artikel','berita']);
            $table->date('tanggal');
            $table->string('judul');
            $table->text('isi');
            $table->string('cover')->default('cover-postingan.jpg');
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
        Schema::dropIfExists('postingans');
    }
};
