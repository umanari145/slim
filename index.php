<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Dotenv\Dotenv;
use DI\Container;

require_once __DIR__ . '/vendor/autoload.php';

//.env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// DI container
require_once __DIR__ . '/container/container.php';

$app = AppFactory::create();

//routing
require_once __DIR__ . '/routing/base.php';
$app->run();
