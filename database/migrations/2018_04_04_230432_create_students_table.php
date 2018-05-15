<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
             $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('phone');
            $table->string('gender');
            $table->date('DOB');
             $table->decimal('fees');
             $table->string('image');
            $table->integer('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('s_parents')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('students');
    }
}
