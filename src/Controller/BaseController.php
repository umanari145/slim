<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Container\ContainerInterface;

class BaseController
{
    protected $template;

    protected $log;
    protected $db;

    public function __construct(ContainerInterface $container)
    {
        $this->template = $container->get('template');

        $this->db = $container->get('db');
        $this->log = $container->get('log');
    }

}
