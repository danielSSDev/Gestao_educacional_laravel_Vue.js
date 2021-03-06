<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassInformationStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_information_student', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->unsigned();
            $table->unsignedBigInteger('class_information_id')->unsigned();


            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('class_information_id')->references('id')->on('class_information');
            $table->unique(['student_id', 'class_information_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_information_student');
    }
}
