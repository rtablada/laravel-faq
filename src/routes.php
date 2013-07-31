<?php

Route::group(Config::get('laravel-faq::routes.group_rules'), function()
{
	Route::group(array('prefix' => 'api'), function()
	{
		Route::group(array('prefix' => 'questions'), function()
		{
			Route::get('/', array('uses' => 'Rtablada\LaravelFaq\Api\QuestionsController@index'));
			// Route::get('{query}', array('uses' => 'Rtablada\LaravelFaq\Api\QuestionsController@search'));
			// Route::post('/', array('uses' => 'Rtablada\LaravelFaq\Api\QuestionsController@store'));
			Route::get('store', array('uses' => 'Rtablada\LaravelFaq\Api\QuestionsController@store'));
		});
	});

	Route::get('/', function()
	{
		return 'faq home';
	});
});
