<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameAndDescriptionToToursTable extends Migration
{
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->string('name')->nullable(); // название тура
            $table->text('description')->nullable(); // описание тура
        });
    }

    public function down()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn(['name', 'description']);
        });
    }
}
