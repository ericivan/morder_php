<?php

require './vendor/autoload.php';

$builder = new \DI\ContainerBuilder();

$builder->addDefinitions([
    'UserManager' => \DI\create(\Modern\Di\UserManager::class)
        ->constructor(\DI\get('Mailer')),
    'Mailer'=>\DI\factory(function () {
        return new \Modern\Di\Mailer();
    })
]);

$container = $builder->build();

$userManager = $container->get('UserManager');

$userManager->register('haha', 'hehe');