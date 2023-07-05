<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Action;


class MainAction extends Action
{
    public function action(array $params): void
    {
        $this->render("admin.twig");
    }
}