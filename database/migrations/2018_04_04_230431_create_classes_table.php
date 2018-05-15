<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
          //  $table->decimal('fees');
            $table->string('name');
            $table->integer('year');
            $table->string('level');
            $table->integer('school_id')->unsigned();
             $table->string('schedule')->nullable();     
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('staff_id')->unsigned()->nullable();
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('set null')->onUpdate('cascade');

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
        Schema::dropIfExists('classes');
    }
}
