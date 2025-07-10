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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('play_date', 8)->comment('対局日');
            $table->integer('score_rate')->comment('点棒レート');
            $table->integer('chip_rate')->comment('チップレート');
            $table->string('player1_id', 10)->comment('対局者1_ID');
            $table->string('player2_id', 10)->comment('対局者2_ID');
            $table->string('player3_id', 10)->comment('対局者3_ID');
            $table->string('player4_id', 10)->comment('対局者4_ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
