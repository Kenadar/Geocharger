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
        Schema::create('dayparting', function (Blueprint $table) {
            $table->id();
            $table->integer('geodata_id');
            $table->foreign('geodata_id')->references('id')->on('geodatas');
            $table->string('dayparting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dayparting');
    }
};
