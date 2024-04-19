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
        Schema::create('resiliations', function (Blueprint $table) {
            $table->id();
            $table->integer('last_mois')->nullable();
            $table->integer('refec_peinture')->nullable();
            $table->integer('refec_plomberie')->nullable();
            $table->integer('trav_electricite')->nullable();
            $table->integer('redev_sonabel')->nullable();
            $table->integer('facture_onea')->nullable();
            $table->integer('restant')->nullable();

            $table->foreignId('locations_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resiliations');
    }
};
