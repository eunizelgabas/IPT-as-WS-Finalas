<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_enrollment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('enrollment_id')->unsigned();
            $table->bigInteger('course_id')->unsigned();
            $table->string('program');
            $table->integer('year');
            $table->timestamps();
            
            $table->foreign('enrollment_id')->references('id')->on('enrollments');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_enrollment');
    }
};
