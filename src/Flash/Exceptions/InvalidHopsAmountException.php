<?php

namespace Simtabi\Larabell\Flash\Exceptions;

class InvalidHopsAmountException extends InvalidArgumentException
{
    public function __construct()
    {
        $this->message = 'Invalid hops amount.';
    }
}
