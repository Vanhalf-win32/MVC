<?php
 
namespace App\Controller\Post;
use App\Controller\Action;
use App\Model\Posts\Service;
use App\Model\Exception\BaseException;


class AddNewPostAction extends Action 
{
    

    protected function action(array $params): void
    {
        try {
            $addNewPost = new Service();
            $addNewPost->createPost($_POST['title'], $_POST['content']);
            header("HTTP/1.1 303 Temporary");
            header("Location: /posts");
        } catch (BaseException $e) {
            $this->render('new_post.twig', [
                'active' => '/new_post',
                'error' => $e->getMessage(),
                'title' => !empty($_POST['title']) ? $_POST['title'] : '', 
                'content' => !empty($_POST['content']) ? $_POST['content'] : '',
            ]);
        }
    }
}

