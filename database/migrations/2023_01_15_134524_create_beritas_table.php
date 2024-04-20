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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('judul');
            $table->string('gambar')->nullable();
            $table->longText('deskripsi');
            $table->date('tgl_pendaftaran');
            $table->date('tgl_seleksi1');
            $table->date('tgl_seleksi2');
            $table->date('tgl_seleksi3');
            $table->date('tgl_seleksi4');
            $table->date('tgl_pengumuman');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beritas');
    }
};
