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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('kelompok');
            $table->string('judul');
            $table->string('kategori');
            $table->string('deskripsi');
            $table->string('thumbnail');
            $table->string('ketua');
            $table->string('anggota1')->nullable();
            $table->string('anggota2')->nullable();
            $table->string('anggota3')->nullable();
            $table->string('anggota4')->nullable();
            $table->string('nomor1')->nullable();
            $table->string('nomor2')->nullable();
            $table->string('nomor3')->nullable();
            $table->string('nomor4')->nullable();
            $table->string('jenjang');
            $table->string('sekolah');
            $table->string('cabang');
            $table->string('karya');
            $table->string('sk');
            $table->string('foto');
            $table->string('penilai')->nullable();
            $table->integer('nilai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
};
