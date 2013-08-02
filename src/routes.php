<?php


Route::group(Config::get('laravel-faq::routes.public_rules'), function()
{
	$questions = 'laravel-faq::questions.';

	Route::group(array('prefix' => 'api'), function()
	{
		Route::group(array('prefix' => 'questions'), function()
		{
			Route::get('/', array('uses' => 'Rtablada\LaravelFaq\Api\QuestionsController@index'));
			Route::get('all', array('uses' => 'Rtablada\LaravelFaq\Api\QuestionsController@all'));

			Route::post('/', array('uses' => 'Rtablada\LaravelFaq\Api\QuestionsController@store'));

			Route::get('search', array('uses' => 'Rtablada\LaravelFaq\Api\QuestionsController@search'));

			Route::get('{id}', array('uses' => 'Rtablada\LaravelFaq\Api\QuestionsController@show'));
			Route::delete('{id}', array('uses' => 'Rtablada\LaravelFaq\Api\QuestionsController@delete'));
		});
	});

	Route::get('/', array('uses' => 'Rtablada\LaravelFaq\QuestionsController@index', 'as' => $questions.'index'));
	Route::get('questions/new', array('uses' => 'Rtablada\LaravelFaq\QuestionsController@create', 'as' => $questions.'create'));

});

Route::group(Config::get('laravel-faq::routes.admin_rules'), function()
{
	$admin = 'laravel-faq::admin.';

	Route::get('/', array('uses' => 'Rtablada\LaravelFaq\AdminController@index', 'as' => $admin.'index'));

	Route::group(array('prefix' => 'questions'), function()
	{
		$admin_questions = 'laravel-faq::admin.questions.';

		Route::get('create', array('uses' => 'Rtablada\LaravelFaq\Admin\QuestionsController@create', 'as' => $admin_questions.'create'));
		Route::post('/', array('uses' => 'Rtablada\LaravelFaq\Admin\QuestionsController@store', 'as' => $admin_questions.'store'));

		Route::get('{id}/edit', array('uses' => 'Rtablada\LaravelFaq\Admin\QuestionsController@edit', 'as' => $admin_questions.'edit'));
		Route::put('{id}', array('uses' => 'Rtablada\LaravelFaq\Admin\QuestionsController@update', 'as' => $admin_questions.'update'));

		Route::get('{id}/delete', array('uses' => 'Rtablada\LaravelFaq\Admin\QuestionsController@destroy', 'as' => $admin_questions.'delete'));
	});
});
