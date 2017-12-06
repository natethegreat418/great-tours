<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeparturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departures', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->string('tour_code');
          $table->integer('tour_id')->unsigned();
          $table->foreign('tour_id')->references('id')->on('tours');
          $table->date('tour_date');
          $table->string('status');
          $table->float('price',8,2);
          $table->integer('currently_booked');
          $table->integer('available_spots');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departures');
    }
}
