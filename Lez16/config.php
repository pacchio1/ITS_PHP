<?php

use Psr\Container\ContainerInterface;
$builder = new \DI\ContainerBuilder ();
$builder->addDefinitions ([
'dsn' => 'mysql:host=localhost;dbname=php_lezione;charset=utf8mb',
'PDO' => function(ContainerInterface $c) {
    return new PDO($c->get('dsn'));
}
]);
$container = $builder->build();
$pdo = $container->get('PDO');
