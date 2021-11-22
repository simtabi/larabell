<?php

namespace Simtabi\Larabell\Flash\Message;

use Simtabi\Larabell\Flash\Contracts\FlashMessageFactoryContract;
use Illuminate\Container\Container;

class FlashMessageFactory implements FlashMessageFactoryContract
{
    protected $container;

    public function __construct()
    {
        $this->container = Container::getInstance();
    }

    public function make(): FlashMessage
    {
        return $this->container->make(FlashMessage::class);
    }
}
