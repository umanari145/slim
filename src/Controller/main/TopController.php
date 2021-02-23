<?php

namespace App\Controller\main;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Container\ContainerInterface;
use App\Controller\BaseController;

class TopController extends BaseController
{

    public function showTop(Request $request, Response $response, array $args): Response
    {
        //インスタンスに引数があるときはcall
        //$person = $this->container->call("person", ['John', 22]);
        //$person->showName();
        //$person->showAge();
        return $this->template->render($response, "index.html");
    }

}

