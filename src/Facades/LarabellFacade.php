<?php

namespace Simtabi\Larabell\Facades;

use Illuminate\Support\Facades\Facade;
use Simtabi\Larabell\Supports\Larabell;

class LarabellFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Larabell::class;
    }
}
