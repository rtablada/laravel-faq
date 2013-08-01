<?php

Route::group(Config::get('laravel-faq::routes.group_rules'), function()
{
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

	Route::get('/', function()
	{
		return View::make('laravel-faq::home');
	});
});
