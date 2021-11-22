<?php

namespace Simtabi\Laratoast\Services;

use Countable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Simtabi\Laratoast\Message;

/**
 * @mixin Collection
 */
class FlashViewMessageBag implements Countable
{
    /**
     * The array of the view error bags.
     *
     * @var array
     */
    protected $bags = [];

    /**
     * Create a new instance from an associative array of message collections.
     *
     * @param array|array[] $bags
     *
     * @return FlashViewMessageBag
     */
    public static function make(array $bags): FlashViewMessageBag
    {
        $viewFlashMessageBag = new self();

        foreach ($bags as $bag => $messages) {
            // values() is used since we are not interested in the keys which is a uuid when using session flashing
            $viewFlashMessageBag->put($bag, Collection::make($messages)->values());
        }

        return $viewFlashMessageBag;
    }

    /**
     * Checks if a named MessageBag exists in the bags.
     *
     * @param string $key
     *
     * @return bool
     */
    public function hasBag($key = 'default')
    {
        return isset($this->bags[$key]);
    }

    /**
     * Get a MessageBag instance from the bags.
     *
     * @param string $key
     *
     * @return Collection|FlashNotifier[]
     */
    public function getBag($key)
    {
        return Arr::get($this->bags, $key) ?: new Collection([]);
    }

    /**
     * Get all the bags.
     *
     * @return array
     */
    public function getBags()
    {
        return $this->bags;
    }

    /**
     * Add a new Message collection.
     *
     * @param string $key
     * @param Collection $messages
     *
     * @return $this
     */
    public function put($key, Collection $messages)
    {
        $this->bags[$key] = $messages;

        return $this;
    }

    /**
     * Add a new Message collection.
     *
     * @param FlashNotifier $message
     * @param string $key
     *
     * @return $this
     */
    public function push(Message $message, string $key = 'default')
    {
        $this->bags[$key] = $this->getBag($key)->push($message);

        return $this;
    }

    /**
     * Get the number of messages in the default bag.
     *
     * @return int
     */
    public function count()
    {
        return $this->getBag('default')->count();
    }

    /**
     * Dynamically call methods on the default bag.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->getBag('default')->$method(...$parameters);
    }

    /**
     * Dynamically access a view message bag.
     *
     * @param string $key
     *
     * @return Collection|FlashNotifier[]
     */
    public function __get($key)
    {
        return $this->getBag($key);
    }

    /**
     * Dynamically set a view message bag.
     *
     * @param string $key
     * @param Collection|FlashNotifier[] $value
     *
     * @return void
     */
    public function __set($key, $value)
    {
        $this->put($key, $value);
    }
}
