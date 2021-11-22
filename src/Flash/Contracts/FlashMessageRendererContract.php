<?php

namespace Simtabi\Larabell\Flash\Message;

interface FlashMessageRendererContract
{
    public function render(FlashMessage $flashMessage): string;
}
