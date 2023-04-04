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
        Schema::create('BK', function (Blueprint $table) {
            $table->timestamps();
            $table->string('kodeBK');
            $table->string('namaBK');
            $table->boolean('kategoriBK');
            $table->string('referensiBK');

            $table->primary('kodeBK');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BK');
    }
};
