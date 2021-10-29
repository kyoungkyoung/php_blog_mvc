<?php

namespace App\Service;

use PhpFramework\Database\Adaptor;

class IndexService
{
    public static function getPosts($page, $count)
    {
        return Adaptor::getAll('select * from posts order by id desc limit '.$count.' offset '.$page * $count, [], \App\Post::class);
    }
}