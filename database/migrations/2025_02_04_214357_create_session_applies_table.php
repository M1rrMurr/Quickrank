<?php

use App\Models\CoachingSession;
use App\Models\Game;
use App\Models\User;
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
        Schema::create('session_applies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(CoachingSession::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Game::class)->constrained()->cascadeOnDelete();
            $table->enum('status', ['pending', 'rejected', 'accepted'])->default('pending');
            $table->integer('price_per_hour');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_applies');
    }
};
