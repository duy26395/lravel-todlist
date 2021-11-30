<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Student extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->char('name', 100);
            $table->char('phonenumber',10);
            $table->string('email',100);
            $table->string('address',255);
            $table->bigInteger('classroom_id')->length(20)->unsigned();;

            $table->foreign('classroom_id')->references('id')->on('classroom');
        });
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
