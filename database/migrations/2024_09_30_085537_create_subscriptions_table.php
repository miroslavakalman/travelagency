<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique(); // Поле для email
            $table->timestamps(); // Для хранения времени создания и обновления
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
