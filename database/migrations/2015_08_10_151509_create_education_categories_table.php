<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('education_categories', function(Blueprint $table)
		{
			$table->increments('id');
            $table->text('name');
            $table->mediumText('main_text');
            $table->text('pleged_title');
            $table->mediumText('pleged_text');
            $table->text('video_default');
            $table->integer('order');
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
		Schema::drop('education_categories');
	}

}
