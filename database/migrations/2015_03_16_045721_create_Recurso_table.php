<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecursoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recurso', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('ISBN')->unique();
            $table->string('titulo');
            $table->text('resumen');
            $table->integer('totalPaginas');
            $table->string('tipoLibro');
            $table->string('revista');
            $table->string('monografia');
            $table->string('codEditorial');
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
		Schema::drop('recurso');
	}

}
