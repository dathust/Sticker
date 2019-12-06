<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaigiaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loaigiays', function(Blueprint $table)
		{
			$table->string('id');
			$table->primary('id');
			$table->string('Ten',50)->unique();
			$table->string('Anh');
			$table->string('Gioithieu');
			$table->integer('Soluong');
			$table->integer('Gianhap');
			$table->integer('Giaban');
			$table->string('idHanggiay');
			$table->foreign('idHanggiay')->references('id')->on('hanggiays')->onDelete('cascade');
			$table->string('idNguoisudung');
			$table->foreign('idNguoisudung')->references('id')->on('nguoisudungs')->onDelete('cascade');
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
		Schema::drop('loaigiays');
	}

}
