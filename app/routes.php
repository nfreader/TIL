<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/', TIL::class . ':home')->setName('home');
$app->get('/admin', TIL::class . ':admin')->setName('admin');