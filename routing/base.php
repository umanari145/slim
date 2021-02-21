
<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use controller\main\TopController;

$app->get("/hoge", TopController::class . ":showTop");
