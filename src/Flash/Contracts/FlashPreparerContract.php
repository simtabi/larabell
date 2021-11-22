<?php

namespace Simtabi\Larabell\Flash\Flash;

use Illuminate\Http\Request;

interface FlashPreparerContract
{
    public function handle(FlashNotifier $flash, Request $request);
}
