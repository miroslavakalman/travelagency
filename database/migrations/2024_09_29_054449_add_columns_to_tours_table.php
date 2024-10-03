<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToToursTable extends Migration
{
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->integer('max_people')->default(1); // Максимальное количество людей
            $table->date('start_date')->nullable(); // Дата начала
            $table->date('end_date')->nullable(); // Дата окончания
        });
    }

    public function down()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn(['max_people', 'start_date', 'end_date']);
        });
    }
}
