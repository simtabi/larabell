<?php

namespace Simtabi\Larabell\Flash\Contracts;

use Simtabi\Larabell\Flash\Message\FlashMessage;

interface FlashMessageRendererContract
{
    public function render(FlashMessage $flashMessage): string;
}
