<?php

namespace Simtabi\Larabell\Flash\Providers;

use Simtabi\Larabell\Flash\Contracts\FlashMessageFactoryContract;
use Simtabi\Larabell\Flash\Contracts\FlashMessageRendererContract;
use Simtabi\Larabell\Flash\Contracts\FlashPreparerContract;
use Simtabi\Larabell\Flash\Contracts\FlashRendererContract;
use Simtabi\Larabell\Flash\Contracts\StorageContract;
use Simtabi\Larabell\Larabell;
use Simtabi\Larabell\Flash\Message\FlashMessageFactory;
use Simtabi\Larabell\Flash\Message\FlashMessageViewRenderer;
use Simtabi\Larabell\Flash\Flash\Flash;
use Simtabi\Larabell\Flash\Flash\FlashPreparer;
use Simtabi\Larabell\Flash\Flash\FlashRenderer;
use Simtabi\Larabell\Flash\Storage\StorageManager;
use Simtabi\Larabell\Flash\Storage\SessionStorage;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;
use Simtabi\Laratoast\Services\FlashViewMessageBag;

class FlashServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(StorageContract::class, SessionStorage::class);

        $this->app->bind(FlashRendererContract::class, FlashRenderer::class);

        $this->app->bind(FlashMessageRendererContract::class, FlashMessageViewRenderer::class);

        $this->app->bind(FlashPreparerContract::class, FlashPreparer::class);

        $this->app->bind(FlashMessageFactoryContract::class, FlashMessageFactory::class);

        $this->app->singleton(StorageManager::class, function (Application $app) {
            return new StorageManager($app);
        });
        
        $this->app->bind(StorageContract::class, function (Application $app) {
            /** @var StorageManager $messagesStorageManager */
            $messagesStorageManager = $app->make(StorageManager::class);

            return $messagesStorageManager->driver();
        });

        $this->app->singleton(Larabell::getFlashFacadeName(), function (Application $app) {
            return $app->make(Flash::class);
        });
    }

    private function configure()
    {
        $this->app->booted(function () {
            // This is used when adding a message from a controller: view('posts-index')->withMessage(...)
            View::macro('withMessage', function (Message $message, string $bag = 'default'): View {
                /** @var FlashViewMessageBag $messageBag */
                $messageBag = ViewFacade::shared(Larabell::getConfig('view_share'), new FlashViewMessageBag());

                ViewFacade::share(Larabell::getConfig('view_share'), $messageBag->push($message, $bag));

                return $this;
            });

            // This is used when adding a message from the View Facade: ViewFacade::withMessage(...)
            Factory::macro('withMessage', function (Message $message, string $bag = 'default'): Factory {
                /** @var FlashViewMessageBag $messageBag */
                $messageBag = ViewFacade::shared(Larabell::getConfig('view_share'), new FlashViewMessageBag());

                ViewFacade::share(Larabell::getConfig('view_share'), $messageBag->push($message, $bag));

                return $this;
            });

            // This is used when adding messages from a controller: view('posts-index')->withMessages(...)
            View::macro('withMessages', function (array $messages, string $bag = 'default'): View {
                /** @var FlashViewMessageBag $messageBag */
                $messageBag = ViewFacade::shared(Larabell::getConfig('view_share'), new FlashViewMessageBag());

                /** @var Message $message */
                foreach ($messages as $message) {
                    $messageBag->push($message, $bag);
                }
                ViewFacade::share(Larabell::getConfig('view_share'), $messageBag);

                return $this;
            });

            // This is used when adding messages from the View Facade: ViewFacade::withMessages(...)
            Factory::macro('withMessages', function (array $messages, string $bag = 'default'): Factory {
                /** @var FlashViewMessageBag $messageBag */
                $messageBag = ViewFacade::shared(Larabell::getConfig('view_share'), new FlashViewMessageBag());

                /** @var Message $message */
                foreach ($messages as $message) {
                    $messageBag->push($message, $bag);
                }
                ViewFacade::share(Larabell::getConfig('view_share'), $messageBag);

                return $this;
            });
        });
    }

}
