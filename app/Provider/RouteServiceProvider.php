<?php

namespace App\Provider;

use PhpFramework\Support\ServiceProvider;
use PhpFramework\Routing\Route;

class RouteServiceProvider extends ServiceProvider
{
    public static function register()
    {
        require_once dirname(__DIR__, 2) . '/routes/web.php';
    }

    public static function boot()
    {
        Route::run();
    }
}