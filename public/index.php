<?php

require_once(__DIR__ . '/../app/bootstrap.php');
require_once(__DIR__ . '/../app/routes.php');

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->run();