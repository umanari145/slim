<?php

namespace App\Controller\main;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Container\ContainerInterface;
use App\Controller\BaseController;
use App\Model\User;

class TopController extends BaseController
{

    public function showTop(Request $request, Response $response, array $args): Response
    {
        //インスタンスに引数があるときはcall
        //$person = $this->container->call("person", ['John', 22]);
        //$person->showName();
        //$person->showAge();
        
        //$user = $this->db->table('users')->get();
        //var_dump($user);

        //Eloquentと接続情報が共有されている
        var_dump(User::find(1));

        exit();
        return $this->template->render($response, "index.html");
    }

}

