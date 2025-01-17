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
        Schema::create('metiers', function (Blueprint $table) {
            $table->id();
            $table->string('libelle',120);
            $table->text('description')->comment('Courte description de la compétence');
            $table->string('slug',120)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metiers');
    }
};
