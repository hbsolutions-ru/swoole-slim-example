<?php declare(strict_types=1);

return [
    'server' => [
        'host' => getenv('SERVER_HOST'),
        'port' => intval(getenv('SERVER_PORT')) ?: 80,
    ],
];
