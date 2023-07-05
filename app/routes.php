<?php

use App\Controller\Post\ListAllAction;
use App\Controller\HomeAction;
use App\Controller\Post\NewPostAction;
use App\Controller\Post\AddNewPostAction;
use App\Controller\Admin\MainAction;
use App\Controller\API\ListPostAction;


return function(FastRoute\RouteCollector $r) {
    $r->get('/posts', ListAllAction::class);
    $r->get('/', HomeAction::class);
    $r->get('/new_post', NewPostAction::class);
    $r->addRoute('POST', '/new_post', AddNewPostAction::class );
    $r->get('/admin', MainAction::class);
    $r->get('/api/posts', ListPostAction::class);
};
