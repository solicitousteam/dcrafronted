<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrowdSourcingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crowd_sourcings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('cyclone_name','150');
            $table->string('state','150');
            $table->string('district','150');
            $table->date('date');
            $table->string('event_time','150');
            $table->string('weather_phenomena');
            $table->longText('weather_phenomena_commnet');
            $table->longText('flood_reason');
            $table->longText('flood_reason_comment');
            $table->longText('damage_cause'); 
            $table->longText('damage_cause_comment');
            $table->longText('additional_damage_details');
            $table->longText('questions_to_manager');
            $table->longText('damge_images');
            $table->longText('damge_video');
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
        Schema::dropIfExists('crowd_sourcings');
    }
}
