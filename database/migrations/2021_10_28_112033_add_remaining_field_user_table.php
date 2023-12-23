<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRemainingFieldUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('date_of_birth')->nullable()->after('mpin');
            $table->string('state')->nullable()->after('date_of_birth');
            $table->string('district')->nullable()->after('state');
            $table->string('relative_mobile_number_1')->nullable()->after('district');
            $table->string('relative_mobile_number_2')->nullable()->after('relative_mobile_number_1');
            $table->string('relative_mobile_number_3')->nullable()->after('relative_mobile_number_2');
            $table->string('relative_mobile_number_4')->nullable()->after('relative_mobile_number_3');
            $table->string('relative_mobile_number_5')->nullable()->after('relative_mobile_number_4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
