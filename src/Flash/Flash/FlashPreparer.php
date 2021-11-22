<?php

namespace Simtabi\Larabell\Flash\Flash;

use Illuminate\Http\Request;

class FlashPreparer implements FlashPreparerContract
{
    public function handle(Flash $flash, Request $request)
    {
        $flash->touch();
    }
}
