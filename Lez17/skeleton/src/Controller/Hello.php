<?php
/**
 * Skeleton application for SimpleMVC
 * 
 * @link      http://github.com/simplemvc/skeleton
 * @copyright Copyright (c) Enrico Zimuel (https://www.zimuel.it)
 * @license   https://opensource.org/licenses/MIT MIT License
 */
declare(strict_types=1);

namespace App\Controller;

use League\Plates\Engine;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use SimpleMVC\Controller\ControllerInterface;

class Hello implements ControllerInterface
{
    protected Engine $plates;

    public function __construct(Engine $plates)
    {
        $this->plates = $plates;
    }

    public function execute(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $name = $request->getAttribute('name', 'unknown');

        return new Response(
            200, 
            [],
            $this->plates->render('hello', [
                'name' => ucfirst($name)
            ])
        );
    }
}
