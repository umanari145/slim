<?php

use Dotenv\Dotenv;
use Slim\Factory\AppFactory;
use App\Exceptions\CustomErrorRenderer;

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/settings.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

require_once __DIR__ . '/container.php';

$app = AppFactory::create();

$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);
//第1引数 エラー画面に表示するかいなか
//第2引数 サーバーログにエラーが出るかいなか
//第3引数 例外の詳細も画面に出すか

//オリジナルのエラーハンドリングを登録
$errorHandler = $errorMiddleware->getDefaultErrorHandler();  // (3)
$errorHandler->registerErrorRenderer("text/html", CustomErrorRenderer::class);  // (4)

//routing
require_once __DIR__ . '/route/base.php';
