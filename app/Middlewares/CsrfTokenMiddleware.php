<?php

namespace App\Middlewares;

use PhpFramework\Routing\Middleware;

class CsrfTokenMiddlesare extends Middleware
{
    public static function process()
    {
        $csrfToken = filter_input(INPUT_POST, '_csrfToken', FILTER_SANITIZE_STRING) ?: json_decode(file_get_contents('php://input'))->_csrfToken;

        if(hash_equals($csrfToken, $_SESSION['CSRF_TOKEN'])) {
            return true;
        }
        return header('Location: '. $_SERVER['HTTP_REFERER']);
    }   
}