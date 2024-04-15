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
        Schema::create('encaissements', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->date('date_encaissement')->nullable();
            $table->integer('montant');
            $table->string('periode');
            $table->string('annee');
            $table->string('retard')->nullable();
            $table->boolean('operation_terrain')->nullable()->default(false);

            $table->foreignId('locations_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('users_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encaissements');
    }
};
