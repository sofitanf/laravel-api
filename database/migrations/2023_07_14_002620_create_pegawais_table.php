<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('agama');
            $table->string('alamat');
            $table->date('tgl_lahir');
            $table->enum('gender', array('L', 'P'));
            $table->string('no_hp');
            $table->string('npwp');
            $table->string('avatar')->nullable();
            $table->unsignedBigInteger('gol_id');
            $table->unsignedBigInteger('eselon_id');
            $table->unsignedBigInteger('jabatan_id');
            $table->unsignedBigInteger('tempat_tugas_id');
            $table->unsignedBigInteger('unit_kerja_id');
            $table->timestamps();

            $table->foreign('gol_id')->references('id')->on('golongans');
            $table->foreign('eselon_id')->references('id')->on('eselons');
            $table->foreign('jabatan_id')->references('id')->on('jabatans');
            $table->foreign('tempat_tugas_id')->references('id')->on('tempat_tugas');
            $table->foreign('unit_kerja_id')->references('id')->on('unit_kerjas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
