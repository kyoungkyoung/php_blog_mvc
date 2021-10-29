<?php

namespace App\Provider;

use PhpFramework\Support\ServiceProvider;
use PhpFramework\Support\Theme;

class ThemeServiceProvider extends ServiceProvider
{
    public static function register()
    {
        Theme::setLayout(dirname(__DIR__, 2) . '/resources/views/layouts/app.php');
    }

}