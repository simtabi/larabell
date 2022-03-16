<?php

namespace Simtabi\Larabell;

use Simtabi\Larabell\Traits\SweetalertBuilder;
use Simtabi\Larabell\Traits\ToastBuilder;

trait HasLarabell
{
    use SweetalertBuilder;
    use ToastBuilder;
}
