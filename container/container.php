<?php

namespace lib;

use DI\Container;
use Slim\Views\Twig;
use Slim\Factory\AppFactory;
use lib\Person\PersonInterface;
use lib\Person\Man;
use lib\Person\Woman;

$container = new Container();

$name = $_ENV['APP_DIR'];
$templateDir = sprintf('%s/view', $_ENV['APP_DIR']);

//twigのセット　↓と同じ意味
//$twig = Twig::create($templateDir);
//$container->set("view", $twig);
$container->set("view",
    function () use ($templateDir) {
        $twig = Twig::create($templateDir);
        return $twig;
    }
);

//↓下記はclouseで書かないとだめ
$container->set("person",
    \DI\value(function (string $name, int $age) {
        //男を使いたい場合
        $person = new Man($name, $age);
        //女を使いたい場合
        //$person = new Woman($name, $age);
        return $person;
    })
);

AppFactory::setContainer($container);
