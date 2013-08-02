<?php

return array(
	/*
	|--------------------------------------------------------------------------
	| Faq Route Group
	|--------------------------------------------------------------------------
	|
	| This is the route group rules surrounding the faq public routes
	|
	*/
	'public_rules' => array(
		'prefix' => 'faq',
		// 'domain' => 'faq.site.com',
	),

	/*
	|--------------------------------------------------------------------------
	| Faq Route Group
	|--------------------------------------------------------------------------
	|
	| This is the route group rules surrounding the faq public routes
	|
	*/
	'admin_rules' => array(
		'prefix' => 'faq/admin',
		// 'before' => 'auth',
		// 'domain' => 'faq.site.com',
	),
);
