
<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get("/hoge", function (Request $request, Response $response, array $args) {

    //DIコンテナに登録したtwigを取得する
    $twig = $this->get("view");
    $response = $twig->render($response, "index.html");

    //インスタンスに引数があるときはcall
    $person = $this->call("person", ['John', 22]);
    
    $person->showName();
    $person->showAge();

    return $response;
});
