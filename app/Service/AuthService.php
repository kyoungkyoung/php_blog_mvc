<?php

namespace App\Service;

use PhpFramework\Database\Adaptor;

class AuthService
{
    public static function login($email, $password)
    {
        if($user = current(Adaptor::getAll('select * from users where email=?', [$email], \App\User::class))){
            if(password_verify($password, $user->password)){
                return $_SESSION['user'] = $user;
            }
        }
    }

    public static function logout()
    {
        session_unset();
        return session_destroy();   
    }
}