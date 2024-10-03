<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('number_of_people')->nullable()->after('tour_id'); // Количество человек
            $table->date('start_date')->nullable()->after('number_of_people'); // Дата начала
            $table->date('end_date')->nullable()->after('start_date'); // Дата окончания
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['number_of_people', 'start_date', 'end_date']);
        });
    }
}
