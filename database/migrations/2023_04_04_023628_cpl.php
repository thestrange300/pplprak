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
        Schema::create('CPL', function (Blueprint $table) {
            $table->timestamps();
            $table->string('kodeCPL');
            $table->string('deskripsiCPL');
            $table->string('referensiCPL');
            $table->primary('kodeCPL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CPL');
    }
};
