<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text('text'); // текст отзыва
            $table->string('user_name'); // имя пользователя
            $table->timestamps(); // добавляет created_at и updated_at
            $table->foreignId('tour_id')->constrained()->onDelete('cascade'); // связь с таблицей туров
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
