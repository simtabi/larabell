<?php

namespace Simtabi\Larabell\Flash\Flash;

interface FlashRendererContract
{
    public function render(Flash $laraflash): string;
}
