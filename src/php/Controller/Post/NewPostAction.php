<?php

namespace App\Controller\Post;

use App\Controller\Action;


class NewPostAction extends Action 
{
  
    protected function action(array $params): void
    {
      $this->render('new_post.twig', [
        'active' => '/new_post'
    ]);
    }
}

