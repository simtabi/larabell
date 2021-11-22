<?php

namespace Simtabi\Larabell\Flash\Contracts;

use Simtabi\Larabell\Flash\Flash\Flash;

interface FlashRendererContract
{
    public function render(Flash $laraflash): string;
}
