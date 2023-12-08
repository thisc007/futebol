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
       

        Schema::create('teamplayers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->nullable()->constrained('games')->onDelete('set null');
            //$table->foreign('team_id')->references('id')->on('teams');
            $table->foreignId('player_id')->nullable()->constrained('players')->onDelete('set null');
            //$table->foreign('player_id')->references('id')->on('players');
            $table->integer('team');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teamplayers');
        Schema::dropIfExists('teams');
    }
};
