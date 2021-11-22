<?php

namespace Simtabi\Larabell\Flash\Contracts;

interface FlashMessageFactoryContract
{
    public function make(): FlashMessage;
}
