<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripPlansTable extends Migration
{
    public function up()
    {
        Schema::create('trip_plans', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('destination');
            $table->date('date');
            $table->integer('travelers');
            $table->integer('budget');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trip_plans');
    }
}
