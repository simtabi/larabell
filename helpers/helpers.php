<?php

use Simtabi\Larabell\Flash\Flash\Flash;
use Simtabi\Larabell\Larabell;
use Illuminate\Container\Container;

if (!function_exists('larabellFlasher')) {
    function larabellFlasher(...$args)
    {
        /** @var Flash $flash */
        $flash = Container::getInstance()->make(Larabell::getFlashFacadeName());

        if ($args) {
            return $flash->message(...$args);
        }

        return $flash;
    }
}
