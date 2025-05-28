<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserID'); // Foreign key to users table
            $table->unsignedBigInteger('EventID'); // Foreign key to events table
            $table->decimal('amount', 10, 2); // Payment amount
            $table->string('status'); // Payment status (e.g., "completed", "pending")
            $table->timestamps(); // created_at and updated_at

            // Define foreign key constraints
            $table->foreign('UserID')->references('UserID')->on('users')->onDelete('cascade');
            $table->foreign('EventID')->references('id')->on('events')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}