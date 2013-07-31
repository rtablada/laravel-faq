<?php

use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(Config::get('laravel-faq::database.faq_table'), function($table){
			$table->increments('id');
			$table->string('question');
			$table->text('answer')->nullable();
			$table->decimal('rank', 20, 6)->default(0);
			$table->integer('views')->default(0);
			$table->boolean('answered')->default(false);
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
		//
	}

}
