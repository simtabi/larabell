<?php

namespace Simtabi\Larabell\Flash\Message;

interface FlashMessageFactoryContract
{
    public function make(): FlashMessage;
}
