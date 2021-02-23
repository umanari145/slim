<?php

namespace lib;

use DI\Container;
use Slim\Views\Twig;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;
//use Lib\Person\PersonInterface;
//use Lib\Person\Man;
//use Lib\Person\Woman;


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
/*$container->set("person",
    \DI\value(function (string $name, int $age) {
        //男を使いたい場合
        $person = new Man($name, $age);
        //女を使いたい場合
        //$person = new Woman($name, $age);
        return $person;
    })
);*/

/*$container->set("logger",
    function () {

        ORM::configure('mysql:host=' . DB_HOST. ';dbname=' . DB_NAME);
        ORM::configure('username', DB_USER);
        ORM::configure('password', DB_PASS);
        ORM::configure('driver_options', array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        ORM::configure('return_result_sets', true); // returns result sets
        ORM::configure('logging', true); // returns result sets

        $logUtil = $this->logUtil;
        ORM::configure('logger', function ($log_string) use ($logUtil) {
            $logUtil->addInfo('sql ' . $log_string);
        });

    }
);*/

$container->set("db",
    function () {

        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => $_ENV['DB_TYPE'],
            'host'      => $_ENV['DB_HOST'],
            'database'  => $_ENV['DB_NAME'],
            'username'  => $_ENV['DB_USER'],
            'password'  => $_ENV['DB_PASS'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        return $capsule;
    }
);

AppFactory::setContainer($container);
