<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameSppsToSpp extends Migration
{
    public function up(): void
    {
        Schema::rename('spps', 'spp');
    }

    public function down(): void
    {
        Schema::rename('spp', 'spps');
    }
}
