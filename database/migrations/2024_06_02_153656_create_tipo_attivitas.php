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
        Schema::create('tipo_attivitas', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary();
            $table->integer('tipo_attivita')->nullable();
            $table->string('nome')->nullable();
            $table->text('descrizione')->nullable();
            $table->integer('order')->nullable();
            $table->tinyInteger('published')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_attivitas');
    }
};
