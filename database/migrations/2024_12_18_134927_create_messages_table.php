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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('subject');
            $table->foreignId('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('receiver_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('message');
            $table->boolean('is_opened')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
