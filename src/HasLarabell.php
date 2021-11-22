<?php

namespace Simtabi\Larabell;

use Simtabi\Larabell\Toast\SweetalertBuilder;
use Simtabi\Larabell\Toast\ToastBuilder;

trait HasLarabell
{
    use SweetalertBuilder;
    use ToastBuilder;
}
