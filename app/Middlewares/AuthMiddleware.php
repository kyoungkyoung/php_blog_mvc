<?php

namespace App\Middlewares;

use PhpFramework\Routing\Middleware;

class AuthMiddleware extends Middleware
{
    public static function process()
    {
        if(array_key_exists('user', $_SESSION)) {
            return true;
        }
        return header('Location: /auth/login');
    }   
}