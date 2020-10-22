<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eventName');
            $table->string('eventOwner');
            $table->integer('created_by'); // to track owner's id when allowing access to an event
            $table->integer('status_enabled')->default(0); // for admin to enable: 0-disabled, 1-enabled
            $table->string('eventLocation');
            $table->string('eventRoom');
            $table->string('eventDate1');
            $table->string('eventDate2');
            $table->string('eventTime1');
            $table->string('eventTime2');
            $table->integer('maxNumParticipants');
            $table->string('eventDescription');
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
        Schema::dropIfExists('events');
    }
}
