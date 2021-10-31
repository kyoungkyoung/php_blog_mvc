<?php

namespace App\Controller;

use PhpFramework\Support\Theme;
use App\Service\AuthService;

class AuthController
{
    public static function showLoginForm()
    {
        return Theme::view('auth', [
            'requestUrl' => '/auth'
        ]);
    }

    public static function login()
    {
        [$email, $password] = array_values(filter_input_array(INPUT_POST, [
            'email' => FILTER_VALIDATE_EMAIL | FILTER_SANITIZE_EMAIL,
            'password' => FILTER_DEFAULT
        ]));

        return AuthService::login($email, $password) ? header('Location: /') : header('Location: '.$_SERVER['HTTP_REFERER']);
    }

    public static function logout()
    {
        return AuthService::logout();
    }

}