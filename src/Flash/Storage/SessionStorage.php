<?php

namespace Simtabi\Larabell\Flash\Storage;

use Illuminate\Contracts\Session\Session;
use Simtabi\Larabell\Flash\Contracts\StorageContract;

class SessionStorage implements StorageContract
{
    protected $session;

    protected $key;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function setKey(string $key)
    {
        $this->key = $key;
    }

    public function getKey()
    {
        return $this->key ?? 'flash_messages';
    }

    public function get(): array
    {
        return $this->session->get($this->getKey(), []);
    }

    public function put(array $messages): void
    {
        $this->session->put($this->getKey(), $messages);
    }
}
