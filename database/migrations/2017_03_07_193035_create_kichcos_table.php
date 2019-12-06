<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKichcosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kichcos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('Kichco');
			$table->string('idLoaigiay');
			$table->foreign('idLoaigiay')->references('id')->on('loaigiays')->onDelete('cascade');
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
		Schema::drop('kichcos');
	}

}
