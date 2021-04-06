<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvgTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER venues AFTER INSERT ON `rating_reviews` FOR EACH ROW
             
                   UPDATE venues SET average_rating = (
                        Select AVG(rating)
                        from rating_reviews WHERE venue_id = new.venue_id
                        )
                        WHERE id = new.venue_id
                ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
