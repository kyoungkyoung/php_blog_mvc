<?php

use PhpFramework\Routing\Route;

use App\Middlewares\RequireMiddleware;
use App\Middlewares\CsrfTokenMiddleware;
use App\Middlewares\AuthMiddleware;

Route::add('get', '/', '\App\Controller\IndexController::index');

Route::add('get', '/auth/login', '\App\Controller\AuthController::showLoginForm');
Route::add('post', '/auth', '\App\Controller\AuthController::login', [CsrfTokenMiddleware::class, RequireMiddleware::class]);
Route::add('post', '/auth/logout', '\App\Controller\AuthController::logout');

Route::add('get', '/users/register', '\App\Controller\UserController::create');
Route::add('post', '/users', '\App\Controller\UserController::store', [CsrfTokenMiddleware::class, RequireMiddleware::class]);

Route::add('get', '/posts/write', '\App\Controller\PostController::create', [RequireMiddleware::class]);
Route::add('post', '/posts', '\App\Controller\PostController::store', [AuthMiddleware::class, CsrfTokenMiddleware::class, AuthMiddleware::class]);
Route::add('get', '/posts/{id}', '\App\Controller\PostController::show');
Route::add('get', '/posts/{id}/edit', '\App\Controller\PostController::edit', [AuthMiddleware::class]);
Route::add('patch', '/posts/{id}', '\App\Controller\PostController::update', [AuthMiddleware::class, CsrfTokenMiddleware::class, AuthMiddleware::class]);
Route::add('delete', '/posts/{id}', '\App\Controller\PostController::destroy', [AuthMiddleware::class, CsrfTokenMiddleware::class, AuthMiddleware::class]);