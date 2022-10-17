<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlasmaReqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plasma_reqs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender',['Male','Female']);
            $table->string('age');
            $table->string('mobile_no');
            $table->enum('blood_group',['O+','O-','A+','A-','AB+','AB-','B+','B-']);
            $table->string('positive_date');
            $table->string('negative_date');
            $table->string('state_id');
            $table->string('city_id');
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
        Schema::dropIfExists('plasma_reqs');
    }
}
