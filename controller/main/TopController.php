<?php

namespace controller\main;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Container\ContainerInterface;

class TopController
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function showTop(Request $request, Response $response, array $args): Response
    {
        //DIコンテナに登録したtwigを取得する
        $twig = $this->container->get("view");
        $response = $twig->render($response, "index.html");

        //インスタンスに引数があるときはcall
        $person = $this->container->call("person", ['John', 22]);
        
        $person->showName();
        $person->showAge();

        return $response;
    }

}

