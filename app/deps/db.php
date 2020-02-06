<?php

$container->set('db', function() {
  $pdo = new \PDO(
      getenv('DB_DSN'),
      getenv('DB_USER'),
      getenv('DB_PASS')
  );
  $db = new ParagonIE\EasyDB\EasyDB($pdo, getenv('DB_METHOD'));
  return $db;
});