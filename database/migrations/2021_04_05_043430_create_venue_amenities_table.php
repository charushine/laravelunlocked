<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenueAmenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venue_amenities', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->unsignedBigInteger("venue_id");
            $table->string("amenity_id");
            $table->tinyInteger('status')->default();
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade');
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
        Schema::dropIfExists('venue_amenities');
    }
}
