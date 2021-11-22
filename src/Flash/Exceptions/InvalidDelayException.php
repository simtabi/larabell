<?php

namespace Simtabi\Larabell\Flash\Exceptions;

class InvalidDelayException extends InvalidArgumentException
{
    public function __construct()
    {
        $this->message = 'Invalid delay.';
    }
}
