<?php

namespace App;

use PhpFramework\Database\Adaptor;

class Post
{
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
        return filter_var(mb_substr(strip_tags($this->content), 0, 200), FILTER_SANITIZE_SPECIAL_CHARS);
    }
}