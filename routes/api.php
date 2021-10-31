<?php

use PhpFramework\Routing\Route;
use App\Middlewares\AuthMiddleware;

Route::add('post', '/images', '\App\Controller\ImageController::store', [AuthMiddleware::class]);
Route::add('get', '/images/{path}', '\App\Controller\ImageController::show');