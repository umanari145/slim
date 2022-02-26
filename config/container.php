<?php

namespace lib;

use DI\Container;
use Slim\Views\Twig;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

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

// loggerのセット
$container->set("log",
    function () {
        $log = new Logger('default');

        $date_format = 'Y/m/d H:i:s';
        $format = "%datetime% > %level_name% > %message% %context% %extra%\n";

        $formatter = new LineFormatter($format, $date_format);
        
        $logPath = sprintf('%s/logs/%s-%s.log', $_ENV['APP_DIR'], 'debug', date('Y-m-d'));
        if (!file_exists($logPath)) {
            touch($logPath);
        }

        $stream = new StreamHandler($logPath, Logger::INFO);
        $stream->setFormatter($formatter);
        //出力先(通常ログ)
        $log->pushHandler($stream);

        //メモリ情報や付属的に出す情報を出力
        $log->pushProcessor(function ($record) {
            $memorySize = (int) (memory_get_usage() / (1024 * 1024)) . "MB";
            $record['extra']['memory'] = $memorySize;
            return $record;
        });
        return $log;
    }
);

AppFactory::setContainer($container);
