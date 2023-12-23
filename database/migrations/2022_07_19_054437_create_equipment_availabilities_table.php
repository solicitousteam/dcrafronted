<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipmentAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_availabilities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('department_type')->nullable();
            $table->string('department_name')->nullable();
            $table->text('type')->nullable();
            $table->text('category')->nullable();
            $table->text('condition')->nullable();
            $table->string('year')->nullable();
            $table->longText('remark')->nullable();
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
        Schema::dropIfExists('equipment_availabilities');
    }
}
