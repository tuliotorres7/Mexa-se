<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePresencasTable.
 */
class CreatePresencasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('presencas', function(Blueprint $table) {
			$table->increments('id');
			$table->date('data');
			$table-> unsignedInteger('user_id');
			$table-> unsignedInteger('cliente_id');
			$table->timestamps();
			
			$table->foreign('user_id')->references('id')-> on('users');
			$table->foreign('cliente_id')->references('id')-> on('clientes');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('presencas');
	}
}
