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
        Schema::create('attivita_convs', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->primary();
            $table->string('socio')->nullable();
            $table->string('tipo_attivita')->nullable();
            $table->string('titolo', 300)->nullable();
            $table->longText('descrizione')->nullable();
            $table->text('note')->nullable();
            $table->string('numerominimo')->nullable();
            $table->string('numeromassimo')->nullable();
            $table->string('data_inizio')->nullable();
            $table->string('data_fine')->nullable();
            $table->string('difficolta')->nullable();
            $table->string('lunghezza')->nullable();
            $table->string('dislivello')->nullable();
            $table->string('durata')->nullable();
            $table->string('quotaminima')->nullable();
            $table->string('quotamassima')->nullable();
            $table->string('image_file')->nullable();
            $table->string('altro')->nullable();
            $table->string('linkluogo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attivita_convs');
    }
};
