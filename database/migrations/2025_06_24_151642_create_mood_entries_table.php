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
        Schema::create('mood_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('mood'); // e.g., 'Happy', 'Sad', 'Anxious', etc.
            $table->text('cause')->nullable(); // Optional cause description
            $table->date('entry_date'); // Ensures one entry per day per user
            $table->timestamps();

            // Unique constraint to ensure only one mood entry per user per day
            $table->unique(['user_id', 'entry_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mood_entries');
    }
};
