<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Notifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('push_type')->default('1');
            $table->unsignedBigInteger('user_id')->default('0');
            $table->unsignedBigInteger('from_user_id')->default('0');
            $table->string('push_title')->nullable();
            $table->string('push_message')->nullable();
            $table->bigInteger('object_id')->default('0');
            $table->longtext('extra')->nullable();
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
        Schema::dropIfExists('notifications');
    }
}
