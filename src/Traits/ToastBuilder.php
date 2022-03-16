<?php

namespace Simtabi\Larabell\Traits;

trait ToastBuilder
{

    public ?string $toastIcon                = 'warning'; // Type of toast icon
    public ?string $toastText                = "Don't forget to star the repository if you like it."; // Text that is to be shown in the toast
    public ?string $toastPosition            = 'top-right'; // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values


    public ?string $toastHeading             = 'Note'; // Optional heading to be shown on the toast
    public ?string $toastShowHideTransition  = 'fade'; // fade; slide or plain
    public bool    $toastAllowToastClose     = true; // Boolean value true or false
    public int     $toastHideAfter           = 3000; // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
    public int     $toastStack               = 20; // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time

    public ?string $toastTextAlign           = 'left';  // Text alignment i.e. left, right or center
    public bool    $toastLoader              = true;  // Whether to show loader or not. True by default
    public ?string $toastLoaderBg            = '#9EC600';  // Background color of the toast loader
    public ?string $toastBeforeShow          = null; // will be triggered before the toast is shown
    public ?string $toastAfterShown          = null; // will be triggered after the toat has been shown
    public ?string $toastBeforeHide          = null; // will be triggered before the toast gets hidden
    public ?string $toastAfterHidden         = null; // will be triggered after the toast has been hidden

    /**
     * @param string|null $toastIcon
     * @return self
     */
    public function setToastIcon(?string $toastIcon): self
    {
        $this->toastIcon = $toastIcon;
        return $this;
    }

    /**
     * @param string|null $toastText
     * @return self
     */
    public function setToastText(?string $toastText): self
    {
        $this->toastText = $toastText;
        return $this;
    }

    /**
     * @param string|null $toastPosition
     * @return self
     */
    public function setToastPosition(?string $toastPosition): self
    {
        $this->toastPosition = $toastPosition;
        return $this;
    }

    /**
     * @param string|null $toastHeading
     * @return self
     */
    public function setToastHeading(?string $toastHeading): self
    {
        $this->toastHeading = $toastHeading;
        return $this;
    }

    /**
     * @param string|null $toastShowHideTransition
     * @return self
     */
    public function setToastShowHideTransition(?string $toastShowHideTransition): self
    {
        $this->toastShowHideTransition = $toastShowHideTransition;
        return $this;
    }

    /**
     * @param bool $toastAllowToastClose
     * @return self
     */
    public function setToastAllowToastClose(bool $toastAllowToastClose): self
    {
        $this->toastAllowToastClose = $toastAllowToastClose;
        return $this;
    }

    /**
     * @param int $toastHideAfter
     * @return self
     */
    public function setToastHideAfter(int $toastHideAfter): self
    {
        $this->toastHideAfter = $toastHideAfter;
        return $this;
    }

    /**
     * @param int $toastStack
     * @return self
     */
    public function setToastStack(int $toastStack): self
    {
        $this->toastStack = $toastStack;
        return $this;
    }

    /**
     * @param string|null $toastTextAlign
     * @return self
     */
    public function setToastTextAlign(?string $toastTextAlign): self
    {
        $this->toastTextAlign = $toastTextAlign;
        return $this;
    }

    /**
     * @param bool $toastLoader
     * @return self
     */
    public function setToastLoader(bool $toastLoader): self
    {
        $this->toastLoader = $toastLoader;
        return $this;
    }

    /**
     * @param string|null $toastLoaderBg
     * @return self
     */
    public function setToastLoaderBg(?string $toastLoaderBg): self
    {
        $this->toastLoaderBg = $toastLoaderBg;
        return $this;
    }

    /**
     * @param string|null $toastBeforeShow
     * @return self
     */
    public function setToastBeforeShow(?string $toastBeforeShow): self
    {
        $this->toastBeforeShow = $toastBeforeShow;
        return $this;
    }

    /**
     * @param string|null $toastAfterShown
     * @return self
     */
    public function setToastAfterShown(?string $toastAfterShown): self
    {
        $this->toastAfterShown = $toastAfterShown;
        return $this;
    }

    /**
     * @param string|null $toastBeforeHide
     * @return self
     */
    public function setToastBeforeHide(?string $toastBeforeHide): self
    {
        $this->toastBeforeHide = $toastBeforeHide;
        return $this;
    }

    /**
     * @param string|null $toastAfterHidden
     * @return self
     */
    public function setToastAfterHidden(?string $toastAfterHidden): self
    {
        $this->toastAfterHidden = $toastAfterHidden;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getToastIcon(): ?string
    {
        return $this->toastIcon;
    }

    /**
     * @return string|null
     */
    public function getToastText(): ?string
    {
        return $this->toastText;
    }

    /**
     * @return string|null
     */
    public function getToastPosition(): ?string
    {
        return $this->toastPosition;
    }

    /**
     * @return string|null
     */
    public function getToastHeading(): ?string
    {
        return $this->toastHeading;
    }

    /**
     * @return string|null
     */
    public function getToastShowHideTransition(): ?string
    {
        return $this->toastShowHideTransition;
    }

    /**
     * @return bool
     */
    public function isToastAllowToastClose(): bool
    {
        return $this->toastAllowToastClose;
    }

    /**
     * @return int
     */
    public function getToastHideAfter(): int
    {
        return $this->toastHideAfter;
    }

    /**
     * @return int
     */
    public function getToastStack(): int
    {
        return $this->toastStack;
    }

    /**
     * @return string|null
     */
    public function getToastTextAlign(): ?string
    {
        return $this->toastTextAlign;
    }

    /**
     * @return bool
     */
    public function isToastLoader(): bool
    {
        return $this->toastLoader;
    }

    /**
     * @return string|null
     */
    public function getToastLoaderBg(): ?string
    {
        return $this->toastLoaderBg;
    }

    /**
     * @return string|null
     */
    public function getToastBeforeShow(): ?string
    {
        return $this->toastBeforeShow;
    }

    /**
     * @return string|null
     */
    public function getToastAfterShown(): ?string
    {
        return $this->toastAfterShown;
    }

    /**
     * @return string|null
     */
    public function getToastBeforeHide(): ?string
    {
        return $this->toastBeforeHide;
    }

    /**
     * @return string|null
     */
    public function getToastAfterHidden(): ?string
    {
        return $this->toastAfterHidden;
    }


    /**
     * Show toast error message if error bag has a thing
     *
     * @return false|mixed
     */
    public function fireValidationErrorsThroughToast($heading = null, $override = true)
    {
        $errorBag = $this->getErrorBag()->all();
        if (count($errorBag) > 0){
            $html = '<ul>';
            foreach($errorBag as $error){
                $html .= '<li>' . $error . '</li>';
            }
            $html .= '</ul>';

            if (!empty($heading)) {

            }

            if ($override) {
                $this->setToastHeading((!empty($heading) ? $heading : 'Ooops!'))->setToastIcon('error');
            }
            return $this->setToastText($html)->fireToastNotification();
        }
        return false;
    }


    /**
     * Popup toast notifications
     *
     * @return mixed
     */
    public function fireToastNotification()
    {
        return $this->emit('larabellToast:fire', [
            'icon'               => $this->toastIcon,
            'text'               => $this->toastText,
            'position'           => $this->toastPosition,

            'heading'            => $this->toastHeading,
            'showHideTransition' => $this->toastShowHideTransition,
            'allowToastClose'    => $this->toastAllowToastClose,
            'hideAfter'          => $this->toastHideAfter,
            'stack'              => $this->toastStack,

            'textAlign'          => $this->toastTextAlign,
            'loader'             => $this->toastLoader,
            'loaderBg'           => $this->toastLoaderBg,
            'beforeShow'         => $this->toastBeforeShow,
            'afterShown'         => $this->toastAfterShown,
            'beforeHide'         => $this->toastBeforeHide,
            'afterHidden'        => $this->toastAfterHidden,
        ]);
    }
}
