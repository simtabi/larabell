<?php

namespace Simtabi\Larabell\Flash\Storage;

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
