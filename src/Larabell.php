<?php

namespace Simtabi\Larabell;

use Illuminate\Support\Str;

class Larabell
{

    public const LEVEL_TYPE_INFO    = 'info';
    public const LEVEL_TYPE_SUCCESS = 'success';
    public const LEVEL_TYPE_WARNING = 'warning';
    public const LEVEL_TYPE_ERROR   = 'error';

    public static function getLarabellFacadeName(): string
    {
        return 'larabell';
    }

    public static function getFlashFacadeName(): string
    {
        return 'flash';
    }

    public static function getFlashStorageDriver(): string
    {
        return self::getConfig('flash.storage_driver');
    }

    public static function getConfig($key = '')
    {
        return config('larabell' . (!empty($key) ? ".$key" : ''));
    }

    public static function kebabCase($string)
    {
        return Str::of($string)->kebab();
    }
}
