<?php

namespace App\Provider;

use PhpFramework\Support\ServiceProvider;
use PhpFramework\Routing\Route;

class RouteServiceProvider extends ServiceProvider
{
    public static function register()
    {
        require_once dirname(__DIR__, 2) . '/routes/web.php';
        require_once dirname(__DIR__, 2) . '/routes/api.php';
    }

    public static function boot()
    {
        Route::run();
    }
}