<?php

namespace Simtabi\Larabell\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Simtabi\Larabell\Commands\InstallCommand;
use Simtabi\Larabell\Toast\ToastAlertsServiceProvider;

class LarabellServiceProvider extends BaseServiceProvider
{

    private const PACKAGE_PATH = __DIR__ . '/../../';

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [InstallCommand::class];
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        // merge configurations
        $this->mergeConfigFrom(self::PACKAGE_PATH .'config/config.php', 'larabell');

        // load views
        $this->loadViewsFrom(self::PACKAGE_PATH . 'resources/views', 'larabell');

        if ( $this->app->runningInConsole()) {
            $this->registerPublishables();
            $this->commands([
                InstallCommand::class,
            ]);
        }

        $this->registerDirectives();
        $this->app->register(ToastAlertsServiceProvider::class);

    }

    private function registerPublishables(): void
    {
        $this->publishes([
            self::PACKAGE_PATH . 'config/config.php' => config_path('larabell.php'),
        ], 'larabell:config');

        $this->publishes([
            self::PACKAGE_PATH . 'public'            => public_path('vendor/larabell'),
        ], 'larabell:assets');

        $this->publishes([
            self::PACKAGE_PATH . 'resources/views'   => resource_path('views/vendor/larabell'),
        ], 'larabell:views');
    }

    private function registerDirectives()
    {
        // inject required view files
        Blade::include('larabell::scripts', 'larabellScripts');
        Blade::include('larabell::styles', 'larabellStyles');
    }

}
