<?php


namespace App\Model\Posts;


class Service
{
    public function createPost(string $title, string $content): Post
    {
        $post = new Post($title, $content);
        ( new Repository($GLOBALS['db']) )->add($post);
        return $post;
    }

    public function selectAll(): array
    {
        return ( new Repository($GLOBALS['db']) )->getAll();
    }
}