<?php

namespace Simtabi\Larabell\Flash\Flash;

use Simtabi\Larabell\Flash\Contracts\FlashPreparerContract;
use Illuminate\Http\Request;

class FlashPreparer implements FlashPreparerContract
{
    public function handle(Flash $flash, Request $request)
    {
        $flash->touch();
    }
}
