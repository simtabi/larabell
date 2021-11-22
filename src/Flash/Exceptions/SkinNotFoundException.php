<?php

namespace Simtabi\Larabell\Flash\Exceptions;

class SkinNotFoundException extends InvalidArgumentException
{
    public function __construct($skin)
    {
        $this->message = sprintf('Skin [%s] not found.', $skin);
    }
}
