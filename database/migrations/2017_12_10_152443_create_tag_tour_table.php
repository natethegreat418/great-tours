<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_tour', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('tour_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            $table->foreign('tour_id')->references('id')->on('tours');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_tour');
    }
}
