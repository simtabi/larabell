<?php

namespace Simtabi\Larabell\Flash\Facades;

use Illuminate\Support\Facades\Facade;
use Simtabi\Larabell\LarabelHelper;

class LarabellFlashFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return LarabelHelper::getFlashFacadeName();
    }
}
