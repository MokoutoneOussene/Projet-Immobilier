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
        Schema::create('maisons', function (Blueprint $table) {
            $table->id();
            $table->string('type_maison');
            $table->foreignId('immeubles_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('adresse');
            $table->integer('loyer');
            $table->string('code')->unique()->nullable();
            $table->string('situation');
            $table->string('categorie');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maisons');
    }
};
