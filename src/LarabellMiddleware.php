<?php

namespace Simtabi\Larabell;

use Closure;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Simtabi\Larabell\Flash\Contracts\FlashPreparerContract;
use Simtabi\Laratoast\Services\FlashViewMessageBag;

class LarabellMiddleware
{
    /**
     * The view factory implementation.
     *
     * @var ViewFactory
     */
    protected ViewFactory $view;

    protected $larabell;

    protected $flash;

    public function __construct(FlashPreparerContract $flash, ViewFactory $view)
    {
        $this->larabell = Container::getInstance()->make(Larabell::getFlashFacadeName());
        $this->flash    = $flash;
        $this->view     = $view;
    }

    public function handle(Request $request, Closure $next)
    {
        $this->bindToMessageBag($request);

        $this->larabell->load();

        $this->flash->handle($this->larabell, $request);

        $response = $next($request);

        $this->larabell->save();

        return $response;
    }

    private function bindToMessageBag(Request $request)
    {
        // If the current session has a "messages" variable bound to it, we will share
        // its value with all view instances so the views can easily access messages
        // without having to bind. An empty collection is set when there aren't any messages.
        $this->view->share(
            'messages',
            FlashViewMessageBag::make($request->session()->get(Larabell::getFlashFacadeName()) ?: [])
        );

        // Putting the messages in the view for every view allows the developer to just
        // assume that some messages are always available, which is convenient since
        // they don't have to continually run checks for the presence of messages.
    }
}
