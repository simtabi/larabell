<?php

namespace Simtabi\Larabell\Flash\Flash;

interface FlashRendererContract
{
    public function render(FlashNotifier $laraflash): string;
}
