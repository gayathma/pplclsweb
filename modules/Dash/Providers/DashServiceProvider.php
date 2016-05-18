<?php namespace Modules\Dash\Providers;

use Illuminate\Support\ServiceProvider;

class DashServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the application events.
	 * 
	 * @return void
	 */
	public function boot()
	{
		$this->registerViews();
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
	 * Register views.
	 * 
	 * @return void
	 */
	public function registerViews()
	{
		$sourcePath = __DIR__.'/../Resources/views';

		$this->loadViewsFrom([$sourcePath], 'dash');
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
