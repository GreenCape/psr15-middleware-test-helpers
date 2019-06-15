<?php

declare (strict_types=1);

namespace VM\Psr15Mocks\Tests;

use PHPUnit\Framework\TestCase;
use VM\Psr15Mocks\Middleware;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UploadedFileInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class MiddlewareTest extends TestCase
{
    use Middleware;

    public function testBuildsAndDestructorsShouldBuildAndDestruct(): void
    {
        $variants = [
            'response' => ResponseInterface::class,
            'request' => ServerRequestInterface::class,
            'uri' => UriInterface::class,
            'uploadedFile' => UploadedFileInterface::class,
            'requestHandler' => RequestHandlerInterface::class,
            'body' => StreamInterface::class,
        ];

        foreach ($variants as $variableName => $className) {
            $builderName = 'build' . ucfirst($variableName);
            $destructorName = 'destroy' . ucfirst($variableName);

            $this->assertSame(null, $this->$variableName);
            $this->$builderName();
            $this->assertInstanceOf($className, $this->$variableName);
            $this->$destructorName();
            $this->assertSame(null, $this->$variableName);

        }
    }
}
