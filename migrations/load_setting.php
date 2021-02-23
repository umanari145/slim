<?php

require_once __DIR__ . '/../config/bootstrap.php';

$container = $app->getContainer();
$db = $container->get('db');