<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHanggiaysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hanggiays', function(Blueprint $table)
		{
			$table->string('id');
			$table->primary('id');
			$table->string('Ten')->unique();
			$table->string('Xuatxu');
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
		Schema::drop('hanggiays');
	}

}
