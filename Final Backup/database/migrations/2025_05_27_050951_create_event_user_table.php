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
        Schema::create('event_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('event_id'); // Match the primary key in the events table
            $table->unsignedBigInteger('user_id'); // Match the primary key in the users table
            $table->string('status')->default('pending'); // Status can be 'pending', 'accepted', 'declined'

            // Define foreign key constraints
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('user_id')->references('UserID')->on('users')->onDelete('cascade');

            // Ensure unique event-user pairs
            $table->unique(['event_id', 'user_id'], 'event_user_unique');

            // Index for faster lookups
            $table->index(['event_id', 'user_id'], 'event_user_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_user');
    }
};
