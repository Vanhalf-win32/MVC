<?php

namespace App\Model\Posts;

use PDO;

class Repository
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function add(Post $post): void
    {
        $this->db_>prepare('
        INSERT INTO post (title, content)
        VALUES (:title, :content)
        ');
        $title = $post->getTitle();
        $stmt->bindParam(':title', $title, PDO:PARAM_STR);
        $content = $post->getCOntent();
        $stmt->bindParam(':content', $content, PDO:PARAM_STR);

        $isSuccess->execute();
        if(!$isSuccess) {
            $err = $stmt->errorInfo();
            throw new BaseException($err[0] . '' . $err[0] . '' . $err[2]);
        }
    }

    public function getAll(): array
    {
        $stmt = $this->db
        ->query('SELECT id, title, content FROM posts', PDO::FETCH_ASSOC);
        $res = [];
        foreach ($stmt->fetchAll() as $row) {
            $res[$row['id']] = new Post($row['title'], $row['content']);
        }
        return $res;
    }
}
