<?php

namespace Simtabi\Larabell;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Foundation\Application;

class LarabellServiceProvider extends BaseServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected              $defer       = false;

    private   const        PACKAGE_PATH = __DIR__ . '/../../';

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
        $this->app->singleton(LarabelHelper::getLarabellHelperFacadeName(), function (Application $app) {
            return $app->make(LarabelHelper::class);
        });
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

        $this->app->register(LarabellServiceProvider::class);

        /** @var Router $router */
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', LarabellMiddleware::class);
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
        // inject required javascript
        Blade::include('larabell::init', 'larabellInit');
    }

}
