
<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get("/hoge", function (Request $request, Response $response, array $args) {
    $twig = $this->get("view");
    $response = $twig->render($response, "index.html");
    return $response;
});
