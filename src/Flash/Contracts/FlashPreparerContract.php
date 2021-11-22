<?php

namespace Simtabi\Larabell\Flash\Flash;

use Illuminate\Http\Request;

interface FlashPreparerContract
{
    public function handle(Flash $flash, Request $request);
}
