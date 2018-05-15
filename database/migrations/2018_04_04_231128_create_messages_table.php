<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
             $table->text('description');
            $table->integer('teacher_id')->unsigned()->nullable();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null')->onUpdate('cascade');

            $table->integer('parent_id')->unsigned();
            $table->foreign('parent_id')->references('id')->on('s_parents')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('messages');
    }
}
