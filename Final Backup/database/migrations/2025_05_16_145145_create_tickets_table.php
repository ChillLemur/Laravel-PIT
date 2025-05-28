<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('TicketID');
            $table->unsignedBigInteger('RegistrationID'); // Ensure this matches the type in the registrations table
            $table->foreign('RegistrationID')->references('RegistrationID')->on('registrations')->onDelete('cascade');
            $table->unsignedBigInteger('EventID'); // Ensure this matches the type in the events table
            $table->foreign('EventID')->references('id')->on('events')->onDelete('cascade');
            $table->integer('Quantity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
