<?php namespace Rtablada\LaravelFaq;

use Illuminate\Support\ServiceProvider;

class LaravelFaqServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('rtablada/laravel-faq');

		$this->bootRepositories();

		include __DIR__.'/../../routes.php';
	}

	public function bootRepositories()
	{
		$this->app->bind('Rtablada\LaravelFaq\Repositories\FaqRepository', 'Rtablada\LaravelFaq\Repositories\FaqRepositoryEloquent');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
