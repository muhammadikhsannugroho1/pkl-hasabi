<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('spps', function (Blueprint $table) {
            $table->id(); // Primary key kolom id
            $table->year('tahun'); // Kolom tahun
            $table->decimal('nominal', 8, 2); // Kolom nominal
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('spps');
    }
};

