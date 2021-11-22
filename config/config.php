<?php

return [

    'sweetalert' => [
        //
    ],

    'toast'      => [
        //
    ],

    'flash'      => [

        /*
        |--------------------------------------------------------------------------
        | Single Message Skin
        |--------------------------------------------------------------------------
        |
        | This value is the skin of the single message.
        |
        | Here are some pre-defined skins, which you can use.
        |
        | Styling using Tailwind:
        | - 'larabell::tailwind.banner'
        | - 'larabell::tailwind.left_accent_border'
        | - 'larabell::tailwind.solid'
        | - 'larabell::tailwind.titled'
        | - 'larabell::tailwind.top_accent_border'
        | - 'larabell::tailwind.traditional'
        |
        | Styling using Bootstrap:
        | - 'larabell::bootstrap.basic'
        | - 'larabell::bootstrap.titled'
        | - 'larabell::bootstrap.traditional'
        |
        */
        'skin' => 'larabell::tailwind.left_accent_border',

        /*
        |--------------------------------------------------------------------------
        | Separator Between The Flash Messages
        |--------------------------------------------------------------------------
        |
        | This value is the separator between the flash messages.
        |
        */
        'separator' => '<br>',

        /*
        |--------------------------------------------------------------------------
        | Messages Storage
        |--------------------------------------------------------------------------
        |
        | Drivers: "session", "array"
        |
        */
        'storage_driver' => 'session',
    ],

];
