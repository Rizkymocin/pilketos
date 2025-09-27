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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('public_id');
            $table->foreignId('election_id')->references('id')->on('elections')->onDelete('cascade');
            $table->string('president_name');
            $table->string('vide_president_name');
            $table->integer('pair_number');
            $table->text('vision');
            $table->text('missions');
            $table->text('photo_file');
            $table->text('slogan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
