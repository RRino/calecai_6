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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();;
            $table->date('start');
            $table->date('end');
            $table->string('image_url')->nullable();;
            $table->string('lunghezza')->nullable();;
            $table->string('durata')->nullable();;
            $table->string('difficolta')->nullable();;
            $table->string('tipo_attivita')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
