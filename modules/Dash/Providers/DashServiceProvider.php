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
		$this->app->bind(
	        'Modules\Dash\Contracts\ProjectRepositoryContract', 
	        'Modules\Dash\Repositories\Eloquent\ProjectRepository'
        );

        $this->app->bind(
	        'Modules\Dash\Contracts\ProjectTypeRepositoryContract', 
	        'Modules\Dash\Repositories\Eloquent\ProjectTypeRepository'
        );

        $this->app->bind(
	        'Modules\Dash\Contracts\RoleRepositoryContract', 
	        'Modules\Dash\Repositories\Eloquent\RoleRepository'
        );

        $this->app->bind(
	        'Modules\Dash\Contracts\TechnologyRepositoryContract', 
	        'Modules\Dash\Repositories\Eloquent\TechnologyRepository'
        );

        $this->app->bind(
	        'Modules\Dash\Contracts\SettingRepositoryContract', 
	        'Modules\Dash\Repositories\Eloquent\SettingRepository'
        );

        $this->app->bind(
	        'Modules\Dash\Contracts\EmployeeitRepositoryContract', 
	        'Modules\Dash\Repositories\Eloquent\EmployeeitRepository'
        );

        $this->app->bind(
	        'Modules\Dash\Contracts\TeamRepositoryContract', 
	        'Modules\Dash\Repositories\Eloquent\TeamRepository'
        );
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
