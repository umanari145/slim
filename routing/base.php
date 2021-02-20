
<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

$name = $_ENV['APP_DIR'];
$templateDir = sprintf('%s/view', $_ENV['APP_DIR']);
$twig = Twig::create($templateDir);

$app->get("/hoge", function (Request $request, Response $response, array $args) use ($twig) {
    $response = $twig->render($response, "index.html");
    return $response;
});