<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';

//.env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$app = AppFactory::create();
require_once __DIR__ . '/routing/base.php';
$app->run();
