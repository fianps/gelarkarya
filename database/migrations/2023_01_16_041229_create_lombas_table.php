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
        Schema::create('lombas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('kategori');
            $table->longText('deskripsi');
            $table->longText('aturan')->nullable();
            $table->longText('penilaian')->nullable();
            $table->longText('ketentuan')->nullable();
            $table->date('tanggal_akhir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lombas');
    }
};
