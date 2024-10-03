<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'type'); // тип
            $table->decimal('cost', 10, 2); // стоимость
            $table->integer('duration'); // длительность (например, в днях)
            $table->string('continent'); // континент
            $table->string('country'); // страна
            $table->string('language'); // язык тура
            $table->string('accommodation_type'); // тип проживания
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
