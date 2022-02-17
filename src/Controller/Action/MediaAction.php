<?php declare(strict_types=1);

namespace HBS\SwooleSlimExample\Controller\Action;

use Psr\Http\Message\{
    ResponseInterface as Response,
    ServerRequestInterface as Request,
};
use Slim\Psr7\Factory\StreamFactory;

final class MediaAction
{
    public function __invoke(Request $request, Response $response, $args): Response
    {
        $cacheTimeout = 604800;

        return $response
            ->withStatus(200)
            ->withHeader('Content-Type', 'image/jpeg')
            ->withHeader('Content-Transfer-Encoding', 'binary')
            ->withHeader('Expires', date('D, d M Y H:i:s \\G\\M\\T', time() + $cacheTimeout))
            ->withHeader('Cache-Control', 'max-age=' . $cacheTimeout)
            ->withBody(
                (new StreamFactory())->createStreamFromFile('/var/www/static/image.jpg', 'rb')
            );
    }
}
