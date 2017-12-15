<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('files', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('article_id')->unsigned();
        $table->string('nombre_file');
        $table->string('ruta_file')->nullable();
        $table->string('tipo_file');
        $table->timestamps();

         //Foreign Key
        $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
        
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
