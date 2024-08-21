<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void{
        Schema::create('kelas', function (Blueprint $table) {
            $table->id("id_kelas");
            $table->string("kompetensi_keahlian",50);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void{
        Schema::dropIfExists('kelas');
    }
};
