<?php

use Dotenv\Dotenv;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/settings.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

require_once __DIR__ . '/container.php';

$app = AppFactory::create();

//routing
require_once __DIR__ . '/route/base.php';
