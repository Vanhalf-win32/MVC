<?php

use App\Controller\Post\ListAllAction;
use App\Controller\HomeAction;
use App\Controller\Post\NewPostAction;

return function(FastRoute\RouteCollector $r) {
    $r->get('/posts', ListAllAction::class);
    $r->get('/', HomeAction::class);
    $r->get('/new_post', NewPostAction::class);
};
