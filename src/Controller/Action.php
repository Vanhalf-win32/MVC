<?php

namespace App\Controller;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Exception;
use App\Model\Exception\InvalidDataException;

abstract class Action
{

    public function __invoke(array $params): void
    {
        try {
            $this->action($params);
        } catch (InvalidDataException $e) {
            error_log($e->getMessage());
            header($_SERVER['SERVER_PROTOCOL'] . '400 Bad Request', true, 400);            
        } catch (Exception $e) {
            error_log($e->getMessage());
            header($_SERVER['SERVER_PROTOCOL'] . '500 Internal Server Error' . true, 500);
        }
    }
    

    protected function render(string $tpl, array|null $data = []): void
    {
        $loader = new FilesystemLoader(__DIR__ . '/../View');
        $twig = new Environment($loader, [
            //'cache' => __DIR__ . '/../../var/twig_cache',
        ]);

        $template = $twig->load($tpl);
        if($data === null) {
            $data = [];
        }
        echo $template->render($data);
    }

    abstract protected function action(array $params): void;
}