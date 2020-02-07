<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

try {
  $dotenv->required('APP_ENV')->allowedValues(['prod', 'test', 'dev', 'local']);
} catch (Exception $e){
  print($e->getMessage());
  die();
}

switch (getenv('APP_ENV')) {

  case 'prod':
  default:

    define('DEBUG', FALSE);
    define('ENV_STRING', 'Production');
    define('ENV_BANNER', null);

  break;

  case 'test':

    define('DEBUG', TRUE);
    define('ENV_STRING', 'Testing');
    define('ENV_BANNER', "<span class='badge badge-warning'>Testing</span>");

  break;

  case 'dev':

    define('DEBUG', TRUE);
    define('ENV_STRING', 'Development');
    define('ENV_BANNER', "<span class='badge badge-success'>Development</span>");

  break;

  case 'local':

    define('DEBUG', TRUE);
    define('ENV_STRING', 'Local');
    define('ENV_BANNER', "<span class='badge badge-info'>Local Development</span>");

  break;

}
