<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('username');
            $table->string('password', 60);
            $table->string('picture', 60)->nullable();

            // Relacion identificación
            $table->integer('identification_id')->unsigned();
            $table->foreign('identification_id')
                  ->references('id')->on('identification')
                  ->onDelete('cascade');

            // Relacion Direccion
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')
                  ->references('id')->on('address')
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
        Schema::dropIfExists('student');
    }
}
