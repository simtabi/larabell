<?php

namespace Simtabi\Larabell\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Simtabi\Larabell\Commands\InstallCommand;

class LarabellServiceProvider extends BaseServiceProvider
{

    private string $packageName = 'larabell';
    private const  PACKAGE_PATH = __DIR__ . '/../../';

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
        $this->loadTranslationsFrom(self::PACKAGE_PATH . "resources/lang/", $this->packageName);
        $this->loadMigrationsFrom(self::PACKAGE_PATH.'database/migrations');
        $this->loadViewsFrom(self::PACKAGE_PATH . "resources/views", $this->packageName);
        $this->mergeConfigFrom(self::PACKAGE_PATH . "config/config.php", $this->packageName);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerConsoles();
        $this->registerDirectives();
        $this->app->register(ToastAlertsServiceProvider::class);

    }

    private function registerConsoles(): static
    {
        if ($this->app->runningInConsole())
        {
            $this->commands([
                InstallCommand::class,
            ]);

            $this->publishes([
                self::PACKAGE_PATH . "config/config.php"               => config_path("{$this->packageName}.php"),
            ], "{$this->packageName}:config");

            $this->publishes([
                self::PACKAGE_PATH . "public"                          => public_path("vendor/{$this->packageName}"),
            ], "{$this->packageName}:assets");

            $this->publishes([
                self::PACKAGE_PATH . "resources/views"                 => resource_path("views/vendor/{$this->packageName}"),
            ], "{$this->packageName}:views");

            $this->publishes([
                self::PACKAGE_PATH . "resources/lang"                  => $this->app->langPath("vendor/{$this->packageName}"),
            ], "{$this->packageName}:translations");
        }

        return $this;
    }

    private function registerDirectives()
    {
        // inject required view files
        Blade::include('larabell::scripts', 'larabellScripts');
        Blade::include('larabell::styles', 'larabellStyles');
    }

}
