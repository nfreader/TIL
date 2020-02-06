<?php

use Psr\Container\ContainerInterface;
use DI\Container;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..','.env');
$dotenv->load();
var_dump($_ENV);
$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();

//Adding our classes to the container here
$container->set('TIL', function (ContainerInterface $c) {
  $view = $c->get('view');
  $db = $c->get('db');
  return new TIL\Controller\TILController($view, $db);
});
