<?php

namespace Simtabi\Larabell\Flash\Flash;

use Simtabi\Larabell\Flash\Message\FlashMessage;
use Simtabi\Larabell\Flash\Contracts\FlashMessageRendererContract;
use Simtabi\Larabell\Flash\Contracts\FlashRendererContract;
use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Simtabi\Larabell\Larabell;

class FlashRenderer implements FlashRendererContract
{
    protected $flashMessageRenderer;

    protected $configRepository;

    protected $separator;

    public function __construct(FlashMessageRendererContract $flashMessageRenderer, ConfigRepository $configRepository)
    {
        $this->flashMessageRenderer = $flashMessageRenderer;

        $this->configRepository = $configRepository;
    }

    public function setSeparator(string $separator)
    {
        $this->separator = $separator;
    }

    public function getSeparator()
    {
        return $this->separator ?? $this->configRepository->get(Larabell::getConfig('flash.separator'));
    }

    public function render(Flash $laraflash): string
    {
        return $laraflash->ready()
            ->map(function (FlashMessage $message) {
                return $this->flashMessageRenderer->render($message);
            })
            ->implode($this->getSeparator());
    }
}
