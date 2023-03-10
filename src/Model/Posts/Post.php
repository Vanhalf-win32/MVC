<?php

namespace App\Model\Posts;

class Post 
{
    private string $title;
    private string $content;

    public function __construct(string $title, string $content )
    {
        $this->setTitle($title);
        $this->setContent($content);

    }

    public function getTitle(): string 
    {
        return $this->title;
    }

    public function getContent(): string 
    {
        return $this->content;
    }

    private function setTitle(string $title): void
    {
        if (empty($title)) {
            throw new InvalidDataException('Empty title');
        }
        if (mb_strlen($title) > 255) {
            throw new InvalidDataException('Title must be less than 255 characters');
        }
        $this->title = $title;
    }

    private function setContent(string $content): void
    {
        if (empty($content)) {
            throw new InvalidDataException('Empty title');
        }
        if (mb_strlen($content) > 4000) {
            throw new InvalidDataException('Title must be less than 255 characters');
        }
        $this->content = $content;
    }
}
