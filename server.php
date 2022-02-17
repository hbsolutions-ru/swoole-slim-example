<?php declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

\Swoole\Runtime::enableCoroutine(true, SWOOLE_HOOK_ALL);

/** @var \HBS\SwooleSlimApp\App $swooleSlimApp */
$swooleSlimApp = null;

Swoole\Coroutine\Run(function () use (&$swooleSlimApp) {
    $swooleSlimApp = require __DIR__ . '/src/bootstrap/init.php';
});

// Wait for initialization
sleep(2);

if ($swooleSlimApp === null) {
    printf("App not initialized! Exit..." . PHP_EOL);
    exit(1);
}

/**
 * Websocket Server
 */
$websocketServer = $swooleSlimApp->getServer();

// This 'message' event callback is required to start WS server.
$websocketServer->on('message', function (
    Swoole\WebSocket\Server $server,
    Swoole\WebSocket\Frame $frame
) {
    // Nothing to do
});

$swooleSlimApp->startServer();
