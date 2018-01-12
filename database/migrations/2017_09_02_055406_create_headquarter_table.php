<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadquarterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headquarter', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nit')->nullable();

            // Relacion Institución
            $table->integer('institution_id')->unsigned();
            $table->foreign('institution_id')
                  ->references('id')->on('institution')
                  ->onDelete('cascade');

             // Relacion Dirección
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
        Schema::dropIfExists('headquarter');
    }
}
