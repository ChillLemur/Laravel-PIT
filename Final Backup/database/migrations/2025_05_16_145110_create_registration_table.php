<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id('RegistrationID');
            $table->unsignedBigInteger('UserID'); // Ensure this matches the type in the users table
            $table->foreign('UserID')->references('UserID')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('EventID'); // Ensure this matches the type in the events table
            $table->foreign('EventID')->references('id')->on('events')->onDelete('cascade');
            $table->integer('NumTickets');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrations');
    }
};
