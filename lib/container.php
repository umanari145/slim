<?php

use DI\Container;
use Slim\Views\Twig;
use Slim\Factory\AppFactory;

$container = new Container();

$name = $_ENV['APP_DIR'];
$templateDir = sprintf('%s/view', $_ENV['APP_DIR']);

//↓と同じ意味
//$twig = Twig::create($templateDir);
//$container->set("view", $twig);
$container->set("view",
    function () use ($templateDir) {
        $twig = Twig::create($templateDir);
        return $twig;
    }
);

AppFactory::setContainer($container);
