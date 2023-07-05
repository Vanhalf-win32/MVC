<?php

namespace App\Controller\API;
use App\Controller\Action;
use App\Model\Posts\Service;

class ListPostAction extends Action
{
    public function action(array $params): void
    {
        $postSrv = new Service();
        $posts = $postSrv->selectAll();
        $this->json($posts); 
    }
}