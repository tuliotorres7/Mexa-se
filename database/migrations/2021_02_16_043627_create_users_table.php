<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUsersTable.
 */
class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		//estrutura da tabela no banco
		Schema::create('users', function(Blueprint $table) {
            $table->increments('id');

			//people data
			$table -> char('cpf',11)->unique()->nullable();
			$table -> string('nome',30);
			$table -> char('instrutor',20)->nullable();

			//authentication
			$table -> string('email',80)->unique();
			$table -> string('password',254)->unique()->nullable();
			
			//permission

			$table -> string('status')-> default('active');
			$table -> string('permission')->default('app.user');


			$table -> rememberToken();
			$table->timestamps();
			$table -> softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table){

		 });
		Schema::drop('users');
	}
}
