<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id('meeting_id')->autoIncrement();
            $table->string('meeting_name', 200);
            $table->string('meeting_description', 500);
            $table->string('creator', 100);
            $table->string('moderator_password', 50);
            $table->string('attendee_password', 50);
            $table->date('date');
            $table->time('time', 0);
            $table->boolean('recording');
            $table->boolean('display_on_calendar');
            $table->boolean('approved')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
