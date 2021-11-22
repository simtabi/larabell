<?php

namespace Simtabi\Larabell\Flash\Contracts;

use Illuminate\Http\Request;
use Simtabi\Larabell\Flash\Flash\Flash;

interface FlashPreparerContract
{
    public function handle(Flash $flash, Request $request);
}
