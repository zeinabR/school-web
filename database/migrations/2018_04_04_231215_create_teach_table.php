<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teach', function (Blueprint $table) {
             $table->integer('teacher_id')->unsigned()->nullable();
            $table->integer('course_id')->unsigned();
            $table->integer('class_id')->unsigned();
             $table->primary(['course_id','class_id']);
            // $table->text('teach_day');
            // $table->time('teach_time');
            // $table->longText('exercise')->nullable;
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('teach');
    }
}
