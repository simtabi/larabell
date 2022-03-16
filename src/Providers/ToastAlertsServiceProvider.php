<?php

namespace Simtabi\Larabell\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ToastAlertsServiceProvider extends ServiceProvider
{

    public static array $cdnAssets = [
        'css'  => [
        ],
        'js' => [
            '//cdn.jsdelivr.net/npm/sweetalert2@11'
        ],
    ];

    public static array $assets    = [
        'css'  => [
            'jquery.toast.css',
        ],
        'js' => [
            'jquery.toast.js',
        ],
    ];

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
        $this->registerDirectives();
    }


    private function registerDirectives()
    {
        Blade::directive('larabellToastCss', function () {
            $styles  = $this->getComponentCdnStyles();
            $styles .= $this->getComponentStyles();
            return $styles;
        });

        Blade::directive('larabellToastJs', function () {
            $scripts  = $this->getComponentCdnScripts();
            $scripts .= $this->getComponentScripts();
            return $scripts;
        });
    }

    private function getComponentStyles()
    {
        $styles = self::$assets['css'] ?? [];

        if (is_array($styles) && (count($styles) >= 1)) {

            return collect($styles)->map(function($item) {
                return asset("/vendor/larabell/css/{$item}");
            })->flatten()->map(function($styleUrl) {
                return '<link media="all" type="text/css" rel="stylesheet" href="' . $styleUrl . '">';
            })->implode(PHP_EOL);
        }

        return false;
    }

    private function getComponentScripts()
    {
        $scripts = self::$assets['js'] ?? [];

        if (is_array($scripts) && (count($scripts) >= 1)) {
            return collect($scripts)->map(function($item) {
                return asset("/vendor/larabell/js/{$item}");
            })->flatten()->map(function($scriptUrl) {
                return !empty($scriptUrl) ? '<script src="' . $scriptUrl . '"></script>' : '';
            })->implode(PHP_EOL);
        }

        return false;
    }

    private function getComponentCdnStyles()
    {
        $styles = self::$cdnAssets['css'] ?? [];

        if (is_array($styles) && (count($styles) >= 1)) {

            return collect($styles)->map(function($item) {
                return $item;
            })->flatten()->map(function($styleUrl) {
                return !empty($styleUrl) ? '<link media="all" type="text/css" rel="stylesheet" href="' . $styleUrl . '">' : '';
            })->implode(PHP_EOL);
        }

        return false;
    }

    private function getComponentCdnScripts()
    {

        $scripts = self::$cdnAssets['js'] ?? [];

        if (is_array($scripts) && (count($scripts) >= 1)) {
            return collect($scripts)->map(function($item) {
                return $item;
            })->flatten()->map(function($scriptUrl) {
                return !empty($scriptUrl) ? '<script src="' . $scriptUrl . '"></script>' : '';
            })->implode(PHP_EOL);
        }

        return false;
    }

}
