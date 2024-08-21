<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('id_siswa'); // Primary key kolom id_siswa
            $table->string('nisn')->unique(); // Kolom nisn yang unik
            $table->string('nis')->unique(); // Kolom nis yang unik
            $table->string('nama'); // Kolom nama siswa
            $table->unsignedBigInteger('kelas_id'); // Kolom kelas_id sebagai foreign key
            $table->string('no_telpon'); // Kolom nomor telepon siswa
            $table->unsignedBigInteger('id_spp'); // Kolom id_spp sebagai foreign key
            $table->timestamps(); // Kolom created_at dan updated_at

            // Menambahkan foreign key constraint untuk kelas_id
            //$table->foreign('kelas_id')->references('id_kelas')->on('kelas')->onDelete('cascade');

            // Menambahkan foreign key constraint untuk id_spp
            // $table->foreign('id_spp')->references('id')->on('spps')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('siswa');
    }
};

