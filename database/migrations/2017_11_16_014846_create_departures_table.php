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
          $table->integer('tour_id');
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
