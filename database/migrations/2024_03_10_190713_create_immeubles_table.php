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
        Schema::create('immeubles', function (Blueprint $table) {
            $table->id();
            $table->string('adresse')->nullable();
            $table->string('code')->unique()->nullable();
            $table->string('autres')->nullable();
            $table->string('nbr_locaux')->nullable();
            $table->integer('bailleurs_id')->nullable();
            $table->string('total_loyer')->nullable();
            $table->string('reference')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('immeubles');
    }
};
