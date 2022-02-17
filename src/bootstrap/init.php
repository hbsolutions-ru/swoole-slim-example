<?php declare(strict_types=1);

use HBS\SwooleSlimApp\App;
use HBS\SwooleSlimExample\Controller\Action;
use Slim\App as SlimApp;

return (function (): App {
    $swooleSlimApp = new App(
        __DIR__ . '/config.php',
        __DIR__ . '/di.php'
    );

    $swooleSlimApp->init(
        function (SlimApp $app) {
            // Add some Slim middleware here
        },
        function (SlimApp $app) {
            $app->get('/', Action\HomeAction::class);
            $app->get('/media', Action\MediaAction::class);
        }
    );

    return $swooleSlimApp;
})();
