<?php

require './vendor/autoload.php';

$builder = new \DI\ContainerBuilder();

$builder->addDefinitions([
    'UserManager' => \DI\create(\Modern\Di\UserManager::class)
        ->constructor(\DI\get('Mailer')),
//    'Mailer'=>\DI\factory(function () {
//        return new \Modern\Di\Mailer();
//    }),

//    \Modern\Di\Mailer::class=> function (\DI\Factory\RequestedEntry $entry) {
//        $class = $entry->getName();
//
//        return new $class();
//    }
    \Modern\Di\Video::class => \DI\create(\Modern\Di\Video::class)
        ->constructor(\DI\get('Mailer')),
]);

$builder->useAnnotations(true);


$container = $builder->build();

var_dump($container->get(\Modern\Di\Video::class ));
exit;
//$userManager = $container->get('UserManager');

//$userManager->register('haha', 'hehe');

$container->set('mail', \DI\create(\Modern\Di\Mailer::class));

$mailer = $container->get('mail');

//get 方式获取调用
var_dump($mailer->mail('eric','hi'));

//call 方式调用
$container->call(function ($mail) {
    $mail->mail('eric', 'ivan');
},[
    'mail' => \DI\get('mail'),
]);
