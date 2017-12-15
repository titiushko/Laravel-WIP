<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     * Hacer una tabla horarios de uno a muchos: dias de atencion y horas de atención.
     * Hacer una tabla tipo clínica.
     * Hacer una tabla valoración.
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('name');
            $table->text('services');
            $table->text('description');
            $table->string('facebook');
            $table->string('website');
            $table->enum('state', ['Pendiente', 'Aprobado'])->default('Pendiente');
            $table->text('address');
            $table->string('telephone', 10);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
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
        Schema::dropIfExists('clinics');
    }
}
