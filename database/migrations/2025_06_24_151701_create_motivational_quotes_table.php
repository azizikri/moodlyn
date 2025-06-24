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
        Schema::create('motivational_quotes', function (Blueprint $table) {
            $table->id();
            $table->text('quote'); // The motivational quote text
            $table->string('author')->nullable(); // Author of the quote
            $table->string('category')->nullable(); // Category (e.g., 'motivation', 'happiness', 'calm')
            $table->boolean('is_active')->default(true); // Whether the quote is active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motivational_quotes');
    }
};
