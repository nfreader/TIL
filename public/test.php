<?php

$pdo = new \PDO(
    'mysql:host=mariadb;dbname=TIL',
    'root',
    '123'
);

var_dump($pdo);