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
        Schema::create('geodata', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->decimal('latitude', 0, 90)->nullable();
            $table->decimal('longitude', 0, 90)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('geodata');
    }
};
