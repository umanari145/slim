<?php 

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Dotenv\Dotenv;
use DI\Container;

require_once __DIR__ . '/../config/bootstrap.php';

$app->run();
