<?php

namespace Simtabi\Larabell\Flash\Contracts;

interface StorageContract
{
    public function get(): array;

    public function put(array $messages): void;
}
