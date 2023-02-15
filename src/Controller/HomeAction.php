<?php

namespace App\Controller;
use App\Controller\Action;

class HomeAction extends Action 
{
    protected function action(array $params): void
    {
      $this->render('home.twig');
    }
}