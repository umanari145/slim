<?php

namespace lib;

use DI\Container;
use Slim\Views\Twig;
use Slim\Factory\AppFactory;
use Lib\Person\PersonInterface;
use Lib\Person\Man;
use Lib\Person\Woman;


$container = new Container();

//twigのセット　↓と同じ意味
//$twig = Twig::create($templateDir);
//$container->set("view", $twig);
$container->set("template",
    function () {
        $templateDir = sprintf('%s/view', $_ENV['APP_DIR']);
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
