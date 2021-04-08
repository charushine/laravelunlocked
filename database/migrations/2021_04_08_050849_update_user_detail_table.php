<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('country')->nullable()->after("imagetype");
            $table->string('state')->nullable()->after("country");
            $table->string('city')->nullable()->after("state");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_details', function (Blueprint $table) {
            //
        });
    }
}
