<?php

namespace Simtabi\Larabell\Flash\Storage;

use Illuminate\Support\Manager;
use Simtabi\Larabell\Larabell;

class StorageManager extends Manager
{
    public function getDefaultDriver()
    {
        return $this->container['config'][Larabell::getFlashStorageDriver()];
    }

    public function createSessionDriver()
    {
        return $this->container->make(SessionStorage::class);
    }

    public function createArrayDriver()
    {
        return $this->container->make(ArrayStorage::class);
    }
}
