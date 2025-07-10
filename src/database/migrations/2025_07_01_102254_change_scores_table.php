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
        Schema::table('scores', function (Blueprint $table) {
            $table->integer('player1_score')->nullable()->change();
            $table->integer('player2_score')->nullable()->change();
            $table->integer('player3_score')->nullable()->change();
            $table->integer('player4_score')->nullable()->change();

            $table->integer('player1_id')->after('hanchan_id');
            $table->integer('player2_id')->after('player1_score');
            $table->integer('player3_id')->after('player2_score');
            $table->integer('player4_id')->after('player3_score');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scores', function (Blueprint $table) {
            //
        });
    }
};
