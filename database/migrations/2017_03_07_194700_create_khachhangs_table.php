<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donhangs', function(Blueprint $table)
		{
			$table->string('id');
			$table->primary('id');
			$table->date('Thoigiangui');
			$table->date('Thoigiannhan');
			$table->integer('Soluong');
			$table->integer('Tongthu');
			$table->string('Ghichu');
			$table->string('TinhThanhpho',60);
			$table->string('HuyenQuan',60);
			$table->string('Diachichitiet');
			$table->string('idKhachhang');
			$table->foreign('idKhachhang')->references('id')->on('khachhangs')->onDelete('cascade');
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
		Schema::drop('khachhangs');
	}

}
