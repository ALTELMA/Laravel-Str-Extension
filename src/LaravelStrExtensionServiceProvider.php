<?php

namespace Altelma\LaravelStrExtension;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class LaravelStrExtensionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Str::macro('slugUtf8', function (string $string) {
            return StringHelper::slugUtf8($string);
        });
    }
}
