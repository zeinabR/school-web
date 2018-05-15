<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_grades', function (Blueprint $table) {
            // $table->increments('id');
            $table->integer('teacher_id')->unsigned()->nullable();
            $table->integer('course_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->primary(['course_id','student_id']);
            $table->decimal('grade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('add_grades');
    }
}
