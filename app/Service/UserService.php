<?php

namespace App\Service;

use App\User;

class UserService
{
    public static function register($user)
    {
        return $user->create();
    }
}