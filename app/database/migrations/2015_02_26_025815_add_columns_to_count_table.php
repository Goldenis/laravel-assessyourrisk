<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('count', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('lifestyle');
			$table->integer('knowing');
			$table->integer('family');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('count', function(Blueprint $table)
		{
			$table->dropColumn(
                'id',
            	'lifestyle',
            	'knowing',
            	'family'
            );
		});
	}

}
