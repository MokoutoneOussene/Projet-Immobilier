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
        Schema::create('bailleurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance')->nullable();
            $table->string('lieu')->nullable();
            $table->string('code')->unique()->nullable();
            $table->string('situation')->nullable();
            $table->string('telephone')->nullable();
            $table->string('profession')->nullable();
            $table->string('cnib')->nullable();
            $table->string('quartier')->nullable();
            $table->string('resident')->nullable();
            $table->string('prevent_name')->nullable();
            $table->string('prevent_phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bailleurs');
    }
};
