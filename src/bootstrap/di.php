<?php declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Slim\{
    App,
    Factory\AppFactory,
};
use Swoole\WebSocket\Server;

return [
    App::class => function (ContainerInterface $c) {
        AppFactory::setContainer($c);
        return AppFactory::create();
    },

    Server::class => function (ContainerInterface $c) {
        $settings = $c->get('server');

        $server = new Server($settings['host'], $settings['port']);

        // Configure Swoole Server here:
        //$server->set([ ... ]);

        return $server;
    },
];
