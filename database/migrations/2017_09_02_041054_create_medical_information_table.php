<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ips', 100)->nullable();
            $table->string('ars', 100)->nullable();

            // Relacion Estudiante
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')
                  ->references('id')->on('student')
                  ->onDelete('cascade');

            // Relacion Eps
            $table->integer('eps_id')->unsigned();
            $table->foreign('eps_id')
                  ->references('id')->on('eps')
                  ->onDelete('cascade');

            // Relacion Tipo de sangre
            $table->integer('blood_type_id')->nullable()->unsigned();
            $table->foreign('blood_type_id')
                  ->references('id')->on('blood_type')
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
        Schema::dropIfExists('medical_information');
    }
}
