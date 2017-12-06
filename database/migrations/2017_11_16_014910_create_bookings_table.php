<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->string('tour_code');
          $table->integer('tour_id')->unsigned();
          $table->foreign('tour_id')->references('id')->on('tours');
          $table->integer('departure_id')->unsigned();
          $table->foreign('departure_id')->references('id')->on('departures');
          $table->string('user');
          $table->string('status');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
