<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietdonhangsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chitietdonhangs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('idLoaigiay');
			$table->foreign('idLoaigiay')->references('id')->on('loaigiays')->onDelete('cascade');
			$table->integer('Soluong');
			$table->integer('Giatien');
			$table->string('idDonhang');
			$table->foreign('idDonhang')->references('id')->on('donhangs')->onDelete('cascade');
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
		Schema::drop('chitietdonhangs');
	}

}
