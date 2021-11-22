<?php

namespace Simtabi\Larabell;

use Closure;
use Simtabi\Larabell\Flash\Flash\FlashPreparerContract;
use Illuminate\Container\Container;
use Illuminate\Http\Request;

class LarabellMiddleware
{
    protected $larabell;

    protected $flash;

    public function __construct(FlashPreparerContract $flash)
    {
        $this->larabell = Container::getInstance()->make(Larabell::getFlashFacadeName());
        $this->flash    = $flash;
    }

    public function handle(Request $request, Closure $next)
    {
        $this->larabell->load();

        $this->flash->handle($this->larabell, $request);

        $response = $next($request);

        $this->larabell->save();

        return $response;
    }
}
