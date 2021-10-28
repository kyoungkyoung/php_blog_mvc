<?php

namespace App\Provider;

use PhpFramework\Support\ServiceProvider;
use PhpFramework\Database\Adaptor;

class DatabaseServiceProvider extends ServiceProvider
{
    public static function register()
    {
        Adaptor::setup('mysql:dbname=phpblog1', 'root', '40387961As!!');
    }
}