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
        Schema::create('hanchan_scores', function (Blueprint $table) {
            $table->id();
            $table->integer('hanchan_id');
            $table->integer('player_id');
            $table->integer('score');
            $table->integer('chip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hanchan_scores');
    }
};
