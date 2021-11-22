<?php

namespace Simtabi\Larabell\Flash\Storage;

use Simtabi\Larabell\Flash\Contracts\StorageContract;

class ArrayStorage implements StorageContract
{
    protected $messages = [];

    public function get(): array
    {
        return $this->messages;
    }

    public function put(array $messages): void
    {
        $this->messages = $messages;
    }
}
