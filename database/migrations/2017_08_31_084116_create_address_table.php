<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobil')->nullable();
            $table->string('email')->nullable();

            // Relacion Ciudad
            $table->integer('id_city_address')->unsigned();
            $table->foreign('id_city_address')
                  ->references('id')->on('city')
                  ->onDelete('cascade');

            // Relacion Zona rural
            $table->integer('zone_id')->unsigned();
            $table->foreign('zone_id')
                  ->references('id')->on('zone')
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
        Schema::dropIfExists('address');
    }
}
