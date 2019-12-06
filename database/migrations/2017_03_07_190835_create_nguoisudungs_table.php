<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNguoisudungsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nguoisudungs', function(Blueprint $table)
		{
			$table->string('id');
			$table->primary('id');
			$table->string('Sodienthoai',60)->unique();
			$table->string('Matkhau', 60);
			$table->string('Hoten',60);
			$table->string('Tinh/Thanhpho',60);
			$table->string('Huyen/Quan',60);
			$table->tinyInteger('Quyen');
			$table->rememberToken();
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
		Schema::drop('nguoisudungs');
	}

}
