<?php

use Simtabi\Larabell\Flash\Flash\FlashNotifier;
use Simtabi\Larabell\LarabelHelper;
use Illuminate\Container\Container;

if (!function_exists('larabellFlasher')) {
    function larabellFlasher(...$args)
    {
        /** @var FlashNotifier $flash */
        $flash = Container::getInstance()->make(LarabelHelper::getFlashFacadeName());

        if ($args) {
            return $flash->message(...$args);
        }

        return $flash;
    }
}
