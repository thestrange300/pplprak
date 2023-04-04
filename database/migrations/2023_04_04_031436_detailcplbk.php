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
        Schema::create('detail_cplbk', function (Blueprint $table) {
            $table->string('cpl')->index();
            $table->foreign('cpl')->references('kodeCPL')->on('CPL')->onDelete('cascade');
            $table->string('bk')->index();
            $table->foreign('bk')->references('kodeBK')->on('BK')->onDelete('cascade');          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_cplbk');
    }
};
