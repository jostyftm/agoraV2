<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapacityStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacity_student', function (Blueprint $table) {
            $table->increments('id');

            // Relacion Estudiante
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')
                  ->references('id')->on('student')
                  ->onDelete('cascade');

            // Relacion Capacidades excepcionales
            $table->integer('capacity_id')->unsigned();
            $table->foreign('capacity_id')
                  ->references('id')->on('capacity')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('capacity_student');
    }
}
