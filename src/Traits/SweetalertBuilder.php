<?php

namespace Simtabi\Larabell\Traits;

trait SweetalertBuilder
{
    public bool   $isSwalConfirmModal        = false; // trigger modal type, else confirm modal
    public string $swalConfirmedText         = 'Successfully confirmed!';
    public string $swalConfirmCancelledText  = 'Confirm action canceled!';
    public string $swalConfirmedTitle        = 'Confirmed!';
    public string $swalConfirmCancelledTitle = 'Canceled!';

    public string $swalEventMethod; // event method
    public array  $swalEventMethodParams; // event method params

    public ?string $swalEventCancelledMethod      = null; // cancelled event method
    public array  $swalEventCancelledMethodParams = []; // cancelled event method params

    public string $swalIcon                       = 'warning'; // Type of toast icon
    public string $swalText                       = "Don't forget to star the repository if you like it."; // Text that is to be shown in the toast
    public string $swalPosition                   = 'top-right'; // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values


    // defaults
    public string   $swalTitle                  = 'Oops...';
    public string   $swalFooter                 = '<a href="">Why do I have this issue?</a>';

    // with image
    public ?string  $swalImageUrl               = null;
    public string   $swalImageAlt               = 'A swak image';
    public int      $swalImageHeight            = 1500;
    public int      $swalImageWidth             = 400;

    // with html
    public string   $swalHtml                   = 'You can use <b>bold text</b>, <a href="//sweetalert2.github.io">links</a> and other HTML tags';
    public bool     $swalShowCloseButton        = true;
    public bool     $swalShowCancelButton       = true;
    public bool     $swalFocusConfirm           = false;
    public string   $swalConfirmButtonText      = '<i class="fa fa-thumbs-up"></i> Great!';
    public string   $swalConfirmButtonAriaLabel = 'Thumbs up, great!';
    public string   $swalCancelButtonText       = '<i class="fa fa-thumbs-down"></i>';
    public string   $swalCancelButtonAriaLabel  = 'Thumbs down';

    // dialog with 3 buttons
    public bool     $swalShowDenyButton         = true;
    public string   $swalDenyButtonText         = 'Don\'t save';

    // with custom position
    public bool    $swalShowConfirmButton      = false;
    public int     $swalTimer                  = 1500;

    // with animate css
    public string  $swalShowClass              = 'animate__animated animate__fadeInDown';
    public string  $swalHideClass              = 'animate__animated animate__fadeOutUp';

    // confirm dialog
    public string  $swalConfirmButtonColor     = '#3085d6';
    public string  $swalCancelButtonColor      = '#d33';

    // custom width/padding
    public int     $swalWidth                  = 600;
    public string  $swalPadding                = '3em';
    public string  $swalBackground             = '#fff';
    public         $swalBackdrop               = null;

    // autoclose timer
    public bool    $swalTimerProgressBar      = true;
    public ?string $swalDidOpen               = null; // call back
    public ?string $swalWillClose             = null; // timer

    // with rtl
    public string  $swalIconHtml              = '؟';

    /**
     * @return self
     */
    public function setIsSwalConfirmModal(): self
    {
        $this->isSwalConfirmModal = true;
        return $this;
    }

    /**
     * @param string $text
     * @return self
     */
    public function setSwalConfirmedText(string $text): self
    {
        $this->swalConfirmedText = $text;

        return $this;
    }

    /**
     * @param string $text
     * @return self
     */
    public function setSwalConfirmCancelledText(string $text): self
    {
        $this->swalConfirmCancelledText = $text;

        return $this;
    }

    /**
     * @param string $swalConfirmedTitle
     * @return self
     */
    public function setSwalConfirmedTitle(string $swalConfirmedTitle): self
    {
        $this->swalConfirmedTitle = $swalConfirmedTitle;
        return $this;
    }

    /**
     * @param string $swalConfirmCancelledTitle
     * @return self
     */
    public function setSwalConfirmCancelledTitle(string $swalConfirmCancelledTitle): self
    {
        $this->swalConfirmCancelledTitle = $swalConfirmCancelledTitle;
        return $this;
    }

    /**
     * @param string $swalEventMethod
     * @return self
     */
    public function setSwalEventMethod($swalEventMethod): self
    {
        $this->swalEventMethod = $swalEventMethod;
        return $this;
    }
    /**
     * @param array $swalEventMethodParams
     * @return self
     */
    public function setSwalEventMethodParams(...$swalEventMethodParams): self
    {
        $this->swalEventMethodParams = func_get_args();
        return $this;
    }

    /**
     * @param string $swalEventCancelledMethod
     * @return self
     */
    public function setSwalEventCancelledMethod(string $swalEventCancelledMethod): self
    {
        $this->swalEventCancelledMethod = $swalEventCancelledMethod;
        return $this;
    }

    /**
     * @param array $swalEventCancelledMethodParams
     * @return self
     */
    public function setSwalEventCancelledMethodParams(array $swalEventCancelledMethodParams): self
    {
        $this->swalEventCancelledMethodParams = $swalEventCancelledMethodParams;
        return $this;
    }




    /**
     * @param string|null $swalIcon
     * @return self
     */
    public function setSwalIcon(?string $swalIcon): self
    {
        $this->swalIcon = $swalIcon;
        return $this;
    }

    /**
     * @param string|null $swalText
     * @return self
     */
    public function setSwalText(?string $swalText): self
    {
        $this->swalText = $swalText;
        return $this;
    }

    /**
     * @param string|null $swalPosition
     * @return self
     */
    public function setSwalPosition(?string $swalPosition): self
    {
        $this->swalPosition = $swalPosition;
        return $this;
    }

    /**
     * @param string|null $swalTitle
     * @return self
     */
    public function setSwalTitle(?string $swalTitle): self
    {
        $this->swalTitle = $swalTitle;
        return $this;
    }

    /**
     * @param string|null $swalFooter
     * @return self
     */
    public function setSwalFooter(?string $swalFooter): self
    {
        $this->swalFooter = $swalFooter;
        return $this;
    }

    /**
     * @param string|null $swalImageUrl
     * @return self
     */
    public function setSwalImageUrl(?string $swalImageUrl): self
    {
        $this->swalImageUrl = $swalImageUrl;
        return $this;
    }

    /**
     * @param string|null $swalImageAlt
     * @return self
     */
    public function setSwalImageAlt(?string $swalImageAlt): self
    {
        $this->swalImageAlt = $swalImageAlt;
        return $this;
    }

    /**
     * @param int $swalImageHeight
     * @return self
     */
    public function setSwalImageHeight(int $swalImageHeight): self
    {
        $this->swalImageHeight = $swalImageHeight;
        return $this;
    }

    /**
     * @param int $swalImageWidth
     * @return self
     */
    public function setSwalImageWidth(int $swalImageWidth): self
    {
        $this->swalImageWidth = $swalImageWidth;
        return $this;
    }

    /**
     * @param string|null $swalHtml
     * @return self
     */
    public function setSwalHtml(?string $swalHtml): self
    {
        $this->swalHtml = $swalHtml;
        return $this;
    }

    /**
     * @param bool $swalShowCloseButton
     * @return self
     */
    public function setSwalShowCloseButton(bool $swalShowCloseButton): self
    {
        $this->swalShowCloseButton = $swalShowCloseButton;
        return $this;
    }

    /**
     * @param bool $swalShowCancelButton
     * @return self
     */
    public function setSwalShowCancelButton(bool $swalShowCancelButton): self
    {
        $this->swalShowCancelButton = $swalShowCancelButton;
        return $this;
    }

    /**
     * @param bool $swalFocusConfirm
     * @return self
     */
    public function setSwalFocusConfirm(bool $swalFocusConfirm): self
    {
        $this->swalFocusConfirm = $swalFocusConfirm;
        return $this;
    }

    /**
     * @param string|null $swalConfirmButtonText
     * @return self
     */
    public function setSwalConfirmButtonText(?string $swalConfirmButtonText): self
    {
        $this->swalConfirmButtonText = $swalConfirmButtonText;
        return $this;
    }

    /**
     * @param string|null $swalConfirmButtonAriaLabel
     * @return self
     */
    public function setSwalConfirmButtonAriaLabel(?string $swalConfirmButtonAriaLabel): self
    {
        $this->swalConfirmButtonAriaLabel = $swalConfirmButtonAriaLabel;
        return $this;
    }

    /**
     * @param string|null $swalCancelButtonText
     * @return self
     */
    public function setSwalCancelButtonText(?string $swalCancelButtonText): self
    {
        $this->swalCancelButtonText = $swalCancelButtonText;
        return $this;
    }

    /**
     * @param string|null $swalCancelButtonAriaLabel
     * @return self
     */
    public function setSwalCancelButtonAriaLabel(?string $swalCancelButtonAriaLabel): self
    {
        $this->swalCancelButtonAriaLabel = $swalCancelButtonAriaLabel;
        return $this;
    }

    /**
     * @param bool $swalShowDenyButton
     * @return self
     */
    public function setSwalShowDenyButton(bool $swalShowDenyButton): self
    {
        $this->swalShowDenyButton = $swalShowDenyButton;
        return $this;
    }

    /**
     * @param string|null $swalDenyButtonText
     * @return self
     */
    public function setSwalDenyButtonText(?string $swalDenyButtonText): self
    {
        $this->swalDenyButtonText = $swalDenyButtonText;
        return $this;
    }

    /**
     * @param bool $swalShowConfirmButton
     * @return self
     */
    public function setSwalShowConfirmButton(bool $swalShowConfirmButton): self
    {
        $this->swalShowConfirmButton = $swalShowConfirmButton;
        return $this;
    }

    /**
     * @param int $swalTimer
     * @return self
     */
    public function setSwalTimer(int $swalTimer): self
    {
        $this->swalTimer = $swalTimer;
        return $this;
    }

    /**
     * @param string|null $swalShowClass
     * @return self
     */
    public function setSwalShowClass(?string $swalShowClass): self
    {
        $this->swalShowClass = $swalShowClass;
        return $this;
    }

    /**
     * @param string|null $swalHideClass
     * @return self
     */
    public function setSwalHideClass(?string $swalHideClass): self
    {
        $this->swalHideClass = $swalHideClass;
        return $this;
    }

    /**
     * @param string|null $swalConfirmButtonColor
     * @return self
     */
    public function setSwalConfirmButtonColor(?string $swalConfirmButtonColor): self
    {
        $this->swalConfirmButtonColor = $swalConfirmButtonColor;
        return $this;
    }

    /**
     * @param string|null $swalCancelButtonColor
     * @return self
     */
    public function setSwalCancelButtonColor(?string $swalCancelButtonColor): self
    {
        $this->swalCancelButtonColor = $swalCancelButtonColor;
        return $this;
    }

    /**
     * @param int $swalWidth
     * @return self
     */
    public function setSwalWidth(int $swalWidth): self
    {
        $this->swalWidth = $swalWidth;
        return $this;
    }

    /**
     * @param string|null $swalPadding
     * @return self
     */
    public function setSwalPadding(?string $swalPadding): self
    {
        $this->swalPadding = $swalPadding;
        return $this;
    }

    /**
     * @param string|null $swalBackground
     * @return self
     */
    public function setSwalBackground(?string $swalBackground): self
    {
        $this->swalBackground = $swalBackground;
        return $this;
    }

    /**
     * @param string|null $swalBackdrop
     * @return self
     */
    public function setSwalBackdrop(?string $swalBackdrop): self
    {
        $this->swalBackdrop = $swalBackdrop;
        return $this;
    }

    /**
     * @param bool $swalTimerProgressBar
     * @return self
     */
    public function setSwalTimerProgressBar(bool $swalTimerProgressBar): self
    {
        $this->swalTimerProgressBar = $swalTimerProgressBar;
        return $this;
    }

    /**
     * @param string|null $swalDidOpen
     * @return self
     */
    public function setSwalDidOpen(?string $swalDidOpen): self
    {
        $this->swalDidOpen = $swalDidOpen;
        return $this;
    }

    /**
     * @param string|null $swalWillClose
     * @return self
     */
    public function setSwalWillClose(?string $swalWillClose): self
    {
        $this->swalWillClose = $swalWillClose;
        return $this;
    }

    /**
     * @param string|null $swalIconHtml
     * @return self
     */
    public function setSwalIconHtml(?string $swalIconHtml): self
    {
        $this->swalIconHtml = $swalIconHtml;
        return $this;
    }

    /**
     * @return string|null
     */
    public function isSwalConfirmModal(): bool
    {
        return $this->isSwalConfirmModal;
    }

    /**
     * @return string
     */
    public function getSwalConfirmedText(): string
    {
        return $this->swalConfirmedText;
    }

    /**
     * @return string
     */
    public function getSwalConfirmCancelledText(): string
    {
        return $this->swalConfirmCancelledText;
    }

    /**
     * @return string
     */
    public function getSwalConfirmedTitle(): string
    {
        return $this->swalConfirmedTitle;
    }

    /**
     * @return string
     */
    public function getSwalConfirmCancelledTitle(): string
    {
        return $this->swalConfirmCancelledTitle;
    }

    /**
     * @return string
     */
    public function getSwalEventMethod(): string
    {
        return $this->swalEventMethod;
    }

    /**
     * @return array
     */
    public function getSwalEventMethodParams(): array
    {
        return $this->swalEventMethodParams;
    }

    /**
     * @return string
     */
    public function getSwalEventCancelledMethod(): string
    {
        return $this->swalEventCancelledMethod;
    }

    /**
     * @return array
     */
    public function getSwalEventCancelledMethodParams(): array
    {
        return $this->swalEventCancelledMethodParams;
    }

    /**
     * @return string|null
     */
    public function getSwalIcon(): ?string
    {
        return $this->swalIcon;
    }

    /**
     * @return string|null
     */
    public function getSwalText(): ?string
    {
        return $this->swalText;
    }

    /**
     * @return string|null
     */
    public function getSwalPosition(): ?string
    {
        return $this->swalPosition;
    }

    /**
     * @return string|null
     */
    public function getSwalTitle(): ?string
    {
        return $this->swalTitle;
    }

    /**
     * @return string|null
     */
    public function getSwalFooter(): ?string
    {
        return $this->swalFooter;
    }

    /**
     * @return string|null
     */
    public function getSwalImageUrl(): ?string
    {
        return $this->swalImageUrl;
    }

    /**
     * @return string|null
     */
    public function getSwalImageAlt(): ?string
    {
        return $this->swalImageAlt;
    }

    /**
     * @return int
     */
    public function getSwalImageHeight(): int
    {
        return $this->swalImageHeight;
    }

    /**
     * @return int
     */
    public function getSwalImageWidth(): int
    {
        return $this->swalImageWidth;
    }

    /**
     * @return string|null
     */
    public function getSwalHtml(): ?string
    {
        return $this->swalHtml;
    }

    /**
     * @return bool
     */
    public function isSwalShowCloseButton(): bool
    {
        return $this->swalShowCloseButton;
    }

    /**
     * @return bool
     */
    public function isSwalShowCancelButton(): bool
    {
        return $this->swalShowCancelButton;
    }

    /**
     * @return bool
     */
    public function isSwalFocusConfirm(): bool
    {
        return $this->swalFocusConfirm;
    }

    /**
     * @return string|null
     */
    public function getSwalConfirmButtonText(): ?string
    {
        return $this->swalConfirmButtonText;
    }

    /**
     * @return string|null
     */
    public function getSwalConfirmButtonAriaLabel(): ?string
    {
        return $this->swalConfirmButtonAriaLabel;
    }

    /**
     * @return string|null
     */
    public function getSwalCancelButtonText(): ?string
    {
        return $this->swalCancelButtonText;
    }

    /**
     * @return string|null
     */
    public function getSwalCancelButtonAriaLabel(): ?string
    {
        return $this->swalCancelButtonAriaLabel;
    }

    /**
     * @return bool
     */
    public function isSwalShowDenyButton(): bool
    {
        return $this->swalShowDenyButton;
    }

    /**
     * @return string|null
     */
    public function getSwalDenyButtonText(): ?string
    {
        return $this->swalDenyButtonText;
    }

    /**
     * @return bool
     */
    public function isSwalShowConfirmButton(): bool
    {
        return $this->swalShowConfirmButton;
    }

    /**
     * @return int
     */
    public function getSwalTimer(): int
    {
        return $this->swalTimer;
    }

    /**
     * @return string|null
     */
    public function getSwalShowClass(): ?string
    {
        return $this->swalShowClass;
    }

    /**
     * @return string|null
     */
    public function getSwalHideClass(): ?string
    {
        return $this->swalHideClass;
    }

    /**
     * @return string|null
     */
    public function getSwalConfirmButtonColor(): ?string
    {
        return $this->swalConfirmButtonColor;
    }

    /**
     * @return string|null
     */
    public function getSwalCancelButtonColor(): ?string
    {
        return $this->swalCancelButtonColor;
    }

    /**
     * @return int
     */
    public function getSwalWidth(): int
    {
        return $this->swalWidth;
    }

    /**
     * @return string|null
     */
    public function getSwalPadding(): ?string
    {
        return $this->swalPadding;
    }

    /**
     * @return string|null
     */
    public function getSwalBackground(): ?string
    {
        return $this->swalBackground;
    }

    /**
     * @return string|null
     */
    public function getSwalBackdrop(): ?string
    {
        return $this->swalBackdrop;
    }

    /**
     * @return bool
     */
    public function isSwalTimerProgressBar(): bool
    {
        return $this->swalTimerProgressBar;
    }

    /**
     * @return string|null
     */
    public function getSwalDidOpen(): ?string
    {
        return $this->swalDidOpen;
    }

    /**
     * @return string|null
     */
    public function getSwalWillClose(): ?string
    {
        return $this->swalWillClose;
    }

    /**
     * @return string|null
     */
    public function getSwalIconHtml(): ?string
    {
        return $this->swalIconHtml;
    }

    /**
     * Popup sweetalert modal
     *
     * @return mixed
     */
    public function fireSwalNotification(?string $componentName = null)
    {
        return $this->emit('larabellSwal:fire', [
            'componentName'               => $componentName,
            'isConfirmModal'              => $this->isSwalConfirmModal,

            'swalConfirmedText'           => $this->swalConfirmedText,
            'swalConfirmCancelledText'    => $this->swalConfirmCancelledText,
            'swalConfirmedTitle'          => $this->swalConfirmedTitle,
            'swalConfirmCancelledTitle'   => $this->swalConfirmCancelledTitle,

            'eventMethod'                 => $this->swalEventMethod,
            'eventMethodParams'           => $this->swalEventMethodParams,

            'eventCancelledMethod'        => $this->swalEventCancelledMethod,
            'eventCancelledMethodParams'  => $this->swalEventCancelledMethodParams,

            'icon'                        => $this->swalIcon,
            'text'                        => $this->swalText,
            'position'                    => $this->swalPosition,

            // defaults
            'title'                       => $this->swalTitle,
            'footer'                      => $this->swalFooter,

            // with image
            'imageUrl'                    => $this->swalImageUrl,
            'imageAlt'                    => $this->swalImageAlt,
            'imageHeight'                 => $this->swalImageHeight,
            'imageWidth'                  => $this->swalImageWidth,

            // with html
            'html'                        => $this->swalHtml,
            'showCloseButton'             => $this->swalShowCloseButton,
            'showCancelButton'            => $this->swalShowCancelButton,
            'focusConfirm'                => $this->swalFocusConfirm,
            'confirmButtonText'           => $this->swalConfirmButtonText,
            'confirmButtonAriaLabel'      => $this->swalConfirmButtonAriaLabel,
            'cancelButtonText'            => $this->swalCancelButtonText,
            'cancelButtonAriaLabel'       => $this->swalCancelButtonAriaLabel,

            // dialog with 3 buttons
            'showDenyButton'              => $this->swalShowDenyButton,
            'denyButtonText'              => $this->swalDenyButtonText,

            // with custom position
            'showConfirmButton'           => $this->swalShowConfirmButton,
            'timer'                       => $this->swalTimer,

            // with animate css
            'showClass'                   => $this->swalShowClass,
            'hideClass'                   => $this->swalHideClass,

            // confirm dialog
            'confirmButtonColor'          => $this->swalConfirmButtonColor,
            'cancelButtonColor'           => $this->swalCancelButtonColor,

            // custom width/padding
            'width'                       => $this->swalWidth,
            'padding'                     => $this->swalPadding,
            'background'                  => $this->swalBackground,
            'backdrop'                    => $this->swalBackdrop,

            // autoclose timer
            'timerProgressBar'            => $this->swalTimerProgressBar,
            'didOpen'                     => $this->swalDidOpen,
            'willClose'                   => $this->swalWillClose,

            // with rtl
            'iconHtml'                    => $this->swalIconHtml,
        ]);
    }
}
