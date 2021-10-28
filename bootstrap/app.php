<?php

use PhpFramework\Application;

$app = new Application([
    \App\Provider\ErrorServiceProvider::class,
    \App\Provider\DatabaseServiceProvider::class,
    \App\Provider\SessionServiceProvider::class,
    \App\Provider\ThemeServiceProvider::class,
    \App\Provider\RouteServiceProvider::class
]);

return $app;