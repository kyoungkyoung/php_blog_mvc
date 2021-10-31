<?php

namespace App\Controller;

use PhpFramework\Support\Theme;
use App\Post;
use App\Service\PostService;

class PostController
{
    public static function create()
    {
        return Theme::view('post', [
            'requestUrl' => '/posts'
        ]);
    }

    public static function store()
    {
        $post = new Post();

        $post->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $post->content = filter_input(INPUT_POST, 'content');
        $post->userId = $_SESSION['user']->id;

        return PostService::write($post)
            ? header('Location: /')
            : header('Location: '.$_SERVER['HTTP_REFERER'])
        ;
    }

    public static function show($id)
    {
        if($post = Post::get($id)) {
            return Theme::view('read', compact('post'));
        }
        return \http_response_code(404);
    }

    public static function edit($id)
    {
        if($post = Post::get($id)){
            $post->isOwner() && Theme::view('post',[
                'post' => $post,
                'requestUrl' => '/posts/'.$post->id,
                'method' => 'patch'
            ]);
        }
        return http_response_code(404);
    }

    public static function update($id)
    {
        if($post = Post::get($id)) {
            //patch로 요청을 했을때는 post로 요청을 한 것과 동일하다
            $post->title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $post->content = filter_input(INPUT_POST, 'content');

            return ($post->isOwner() && PostService::update($post))
                ? header('Location: /posts/'. $post->id)
                : header('Location: ' . $_SERVER['HTTP_REFERER'])
            ;
        }
        return http_response_code(404);
    }

    public static function destroy($id)
    {
        if($post = Post::get($id)) {
            if($post->isOwner() && PostService::delete($post)){
                return \http_response_code(204);
            }
        }
        return http_response_code(404);
    }
}