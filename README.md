![banner](.github/assets/banner.png?raw=true)

# Larabell  <!-- omit in toc -->

A Laravel Livewire library to help you integrate SweetAlert and Toasts on yor applications.

- [Installation](#installation)
- [How to use](#how-to-use)
- [Sweetalert](#sweetalert)
- [Toast](#toast)
- [Available configuration](#available-configuration)

## [Installation](https://packagist.org/packages/simtabi/larabell)

`composer require simtabi/larabell`

## How to use

### 1. Add `LarabellServiceProvider` in `config/app.php` <!-- omit in toc -->

```php
    ...
    \Simtabi\Larabell\LarabellServiceProvider::class
    ...
```

### 2. Include javascript <!-- omit in toc -->

```blade
    ...
    // place this directive in the header
    @larabellCss

    // no need to call this, as it has already been called when you call @larabellScripts
    @larabellInit
    ...
```

### 3. Extra config file <!-- omit in toc -->

Publish the configs: `php artisan vendor:publish --tag=larabell:assets`.
Publish the configs: `php artisan vendor:publish --tag=larabell:config`.
Publish the configs: `php artisan vendor:publish --tag=larabell:views`.
> See [available configuration](#available-configuration)

---

## Building toasts and sweetalerts
To make it easy to build toasts and sweetalerts, we have implemented chained methods to help you with building

## Sweetalert

In your component add `Toast` trait. Then call `toast` method whenever you want.

```php
use Simtabi\Larabell\HasLarabell;
use Livewire\Component;

class MyComponent extends Component
{
    use HasLarabell;

    public function save() {
        $this->fireSwalNotification();
    }

}
```

**sweetalert parameters:**

- title
- [icon](https://sweetalert2.github.io/#icons): success, error, warning, info, question - default is **info**
- timeout: in milliseconds, default is 5000
-
---

## Toast

This is the normal sweetalert [modal](https://sweetalert2.github.io/#examples). In your component add `Fire` trait. Then call `fire` method whenever you want.

```php
use Simtabi\Larabell\HasLarabell;
use Livewire\Component;

class MyComponent extends Component
{
    use HasLarabell;

    public function save() {
        $this->fireToastNotification();
    }

}
```

**toast parameters:**

Refer to the documentation online at: [https://github.com/kamranahmedse/jquery-toast-plugin](https://github.com/kamranahmedse/jquery-toast-plugin)

---

### Credits
-   [Imani Manyara](https://github.com/imanimanyara)
-   [Easter Mukora](https://github.com/eastermukora)
-   https://github.com/coderello/laraflash
-   https://github.com/tjmugova/laravel-flash
-   https://github.com/mattlibera/livewire-flash
-   [All Contributors](../../contributors)
