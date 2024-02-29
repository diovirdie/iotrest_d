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
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->String("name")->unique();
            $table->string("type");//tipo de sensor
            $table->decimal("value",10,2);//valor del sensor
            $table->dateTime("date");//fecha y hora de lectura 
            $table->integer("user_id");//usuario que realiza la lectura 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensors');
    }
};
