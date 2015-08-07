<?php namespace MisterPhilip\MaintenanceMode;

use Illuminate\Support\ServiceProvider;

class MaintenanceModeServiceProvider extends ServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    /**
     * Bootstrap our application events.
     *
     * @return void
     */
	public function boot()
	{
        // Register our resources
        $this->loadViews();
        $this->loadTranslations();
		$this->loadConfig();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->mergeConfigFrom(
            base_path() . '/config/maintenancemode.php', 'maintenancemode'
        );
	}

    /**
     * Register our view files
     *
     * @return void
     */
    protected function loadViews()
    {
        $this->loadViewsFrom(base_path() . '/views', 'maintenancemode');

        $this->publishes([
            base_path() . '/views' => base_path('resources/views/vendor/maintenancemode'),
        ], 'views');
    }

    /**
     * Register our translations
     *
     * @return void
     */
    protected function loadTranslations()
    {
        $this->loadTranslationsFrom(base_path() . '/lang', 'maintenancemode');
    }

    /**
     * Register our config file
     *
     * @return void
     */
    protected function loadConfig()
    {
        $this->publishes([
            base_path() . '/config/maintenancemode.php' => config_path('maintenancemode.php'),
        ], 'config');
    }
}
