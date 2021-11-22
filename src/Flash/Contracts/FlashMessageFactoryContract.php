<?php

namespace Simtabi\Larabell\Flash\Contracts;

use Simtabi\Larabell\Flash\Message\FlashMessage;

interface FlashMessageFactoryContract
{
    public function make(): FlashMessage;
}
