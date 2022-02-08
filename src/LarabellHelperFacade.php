<?php

namespace Simtabi\Larabell;

use Illuminate\Support\Facades\Facade;

class LarabellHelperFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return LarabellHelper::getFlashFacadeName();
    }
}