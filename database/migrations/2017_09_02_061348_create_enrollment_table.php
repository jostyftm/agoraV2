<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('enrollment_year');
            
            // Relacion Estudiante
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')
                  ->references('id')->on('student')
                  ->onDelete('cascade');

            // Relación Sede
            $table->integer('headquarter_id')->unsigned();
            $table->foreign('headquarter_id')
                  ->references('id')->on('headquarter')
                  ->onDelete('cascade');
                  
            // Relacion Salon de clase
            $table->integer('group_id')->nullable()->unsigned();
            $table->foreign('group_id')
                  ->references('id')->on('group')
                  ->onDelete('cascade');

            // Relacion Estado de matricula
            $table->integer('enrollment_state_id')->unsigned();
            $table->foreign('enrollment_state_id')
                  ->references('id')->on('enrollment_state')
                  ->onDelete('cascade');

            // Relacion Resultado de matricula
            $table->integer('enrollment_result_id')->unsigned();
            $table->foreign('enrollment_result_id')
                  ->references('id')->on('enrollment_result')
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
        Schema::dropIfExists('enrollment');
    }
}
