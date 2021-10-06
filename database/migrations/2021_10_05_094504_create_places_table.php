<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('place_name');
            $table->string('place_image');
            $table->string('place_image2');
            $table->string('place_image3');
            $table->string('place_image4');
            $table->string('place_image5');
            $table->string('place_image6');

            $table->string('name');
            $table->string('event_name');
            $table->string('des_place');
            $table->time('time');
            $table->time('time2');

            $table->string('tel');
            $table->string('province');
            $table->string('districts');
            $table->string('sub_district');
            $table->string('lat');

            $table->string('lng');
            
            


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
