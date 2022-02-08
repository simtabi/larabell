<?php

namespace Simtabi\Larabell;

use Simtabi\Larabell\Toast\Traits\SweetalertBuilder;
use Simtabi\Larabell\Toast\Traits\ToastBuilder;

trait HasLarabell
{
    use SweetalertBuilder;
    use ToastBuilder;
}