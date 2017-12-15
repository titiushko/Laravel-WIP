

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('modulos_id')->unsigned();
            //$table->integer('curso_id');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->mediumText('contenido');
            $table->enum('estado', ['publicado', 'oculto'])->default('publicado');
            $table->string('slug')->nullable();

            $table->timestamps();

            //Foreign Key PUBLICACIONES
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            //$table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
            $table->foreign('modulos_id')->references('id')->on('modulos')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}

