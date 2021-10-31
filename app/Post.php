<?php

namespace App;

use PhpFramework\Database\Adaptor;

class Post
{
    public function create()
    {
        return Adaptor::exec(
            'insert into posts(userId, title, content) values(?, ?, ?)',
            [$this->userId, $this->title, $this->content]
        );    
    }
    public function update()
    {
        return Adaptor::exec(
            'update posts set title=?, content=? where id=?',
            [$this->title, $this->content, $this->id]
        );
    }
    public function delete()
    {
        return Adaptor::exec(
            'delete from posts where id=?', [$this->id]
        );
    }
    public function user()
    {
        return current(Adaptor::getAll('select * from users where id=?', [$this->userId], \App\User::class));
    }
    public function getCreatedAt()
    {
        return date('h:i A, M j', strtotime($this->createdAt));
    }

    public function getUsername()
    {
        return $this->user()->getUsername();
    }

    public function getSummary()
    {
        return filter_var(mb_substr(strip_tags($this->content), 0, 200), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    public static function get($id)
    {
        return current(Adaptor::getAll('select * from posts where id=?', [$id], \App\Post::class));
    }

    public function isOwner()
    {
        if(array_key_exists('user', $_SESSION)){
            return $this->userId === $_SESSION['user']->id;
        }
        return false;
    }
}