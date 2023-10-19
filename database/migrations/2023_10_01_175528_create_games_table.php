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
            $table->string('game_name', 50)->unique();
            $table->string('password')->nullable();
            $table->string('word', 20);
            $table->integer('attempts')->default(5);
            $table->boolean('status')->default(0);
            $table->boolean('private_lobby')->default(false);
            $table->boolean('letter_hints')->default(true);
            $table->string('history')->default('');
            $table->smallInteger('attempt')->default(0);
            $table->string('hash_player')->nullable();
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
