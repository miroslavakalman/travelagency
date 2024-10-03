<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagePathToToursTable extends Migration
{
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->string('image_path')->nullable(); // Добавляем новый столбец
        });
    }

    public function down()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn('image_path'); // Удаляем столбец при откате миграции
        });
    }
}
