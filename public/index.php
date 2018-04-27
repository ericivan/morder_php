<?php


use DI\ContainerBuilder;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;
use Modern\HelloWorld;
use function DI\create;
use Relay\Relay;
use Zend\Diactoros\ServerRequestFactory;

require dirname(__DIR__).'/vendor/autoload.php';


$containerBuilder = new ContainerBuilder();

$containerBuilder->useAutowiring(false);

$containerBuilder->useAnnotations(false);

$containerBuilder->addDefinitions([
    HelloWorld::class => create(HelloWorld::class)
        ->constructor(\DI\get('Foo')),
    'Foo' => 'bar',
]);

$container = $containerBuilder->build();

$routes = simpleDispatcher(function (RouteCollector $route) {
    $route->get('/hello', HelloWorld::class);
});


$middlewareQueue[] = new \Middlewares\FastRoute($routes);

$middlewareQueue[] = new \Middlewares\RequestHandler($container);

$requestHandler = new Relay($middlewareQueue);

$requestHandler->handle(ServerRequestFactory::fromGlobals());
