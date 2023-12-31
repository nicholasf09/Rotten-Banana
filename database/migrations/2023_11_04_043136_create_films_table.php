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
        Schema::create('films', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('judul');
            $table->text('sinopsis');
            $table->string('trailer');
            $table->date('tahun_rilis');
            $table->string('durasi');
            $table->string('genre');
            $table->string('path_image');
            $table->string('pg');
            $table->string('director');
            $table->string('original_language');
            $table->string('producer');
            $table->string('distributor');
            $table->integer('like');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
