<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhaosatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('khaosats', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('idLoaigiay');
			$table->foreign('idLoaigiay')->references('id')->on('loaigiays')->onDelete('cascade');
			$table->string('Gioitinh');
			$table->string('Dotuoi');
			$table->string('Tinhcach');
			$table->string('Chieucao');
			$table->string('Cannang');
			$table->string('Nghenghiep');
			$table->string('Mausac');
			$table->string('Hoatdong');			
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
		Schema::drop('khaosats');
	}

}
