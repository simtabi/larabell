<?php

namespace Simtabi\Larabell;

use Illuminate\Support\Facades\Facade;
use Simtabi\Larabell\Larabell;

class LarabellFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Larabell::getFlashFacadeName();
    }
}
