<?php

namespace Simtabi\Larabell\Flash\Storage;

interface StorageContract
{
    public function get(): array;

    public function put(array $messages): void;
}
