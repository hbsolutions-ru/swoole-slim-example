<?php declare(strict_types=1);

namespace HBS\SwooleSlimExample\Controller\Action;

use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface as Request,
};

final class HomeAction
{
    public function __invoke(Request $request, Response $response, $args): Response
    {
        $response->getBody()->write("Hello, World!");

        return $response
            ->withStatus(200)
            ->withHeader('Content-Type', 'text/html');
    }
}
