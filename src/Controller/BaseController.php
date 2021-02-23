<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Container\ContainerInterface;

class BaseController
{
    protected $template;

    public function __construct(ContainerInterface $container)
    {
        $this->template = $container->get('template');
    }

}
