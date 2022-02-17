<?php declare(strict_types=1);

use HBS\SwooleSlimApp\App;
use Slim\App as SlimApp;
use HBS\SwooleSlimExample\Controller\Action\HomeAction;

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
            $app->get('/', HomeAction::class);
        }
    );

    return $swooleSlimApp;
})();
