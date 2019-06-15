<?php

declare(strict_types=1);

namespace VM\Psr15Mocks;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UploadedFileInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

trait Middleware
{
    private $response;
    private $request;
    private $requestHandler;
    private $body;
    private $uri;
    private $uploadedFile;

    private function buildResponse(): void
    {
        $this->response = $this->getMockBuilder(ResponseInterface::class)
            ->disableOriginalConstructor()
            ->setMethods([
                'getStatusCode',
                'withStatus',
                'getReasonPhrase',
                'getProtocolVersion',
                'withProtocolVersion',
                'getHeaders',
                'hasHeader',
                'getHeader',
                'getHeaderLine',
                'withHeader',
                'withAddedHeader',
                'withoutHeader',
                'getBody',
                'withBody',
            ])
            ->getMock()
        ;
    }

    private function destroyResponse(): void
    {
        $this->response = null;
    }

    public function buildRequest(): void
    {
        $this->request = $this->getMockBuilder(ServerRequestInterface::class)
            ->disableOriginalConstructor()
            ->setMethods([
                'getServerParams',
                'getCookieParams',
                'withCookieParams',
                'getQueryParams',
                'withQueryParams',
                'getUploadedFiles',
                'withUploadedFiles',
                'getParsedBody',
                'withParsedBody',
                'getAttributes',
                'getAttribute',
                'withAttribute',
                'withoutAttribute',
                'getProtocolVersion',
                'withProtocolVersion',
                'getHeaders',
                'hasHeader',
                'getHeader',
                'getHeaderLine',
                'withHeader',
                'withAddedHeader',
                'withoutHeader',
                'getBody',
                'withBody',
                'getRequestTarget',
                'withRequestTarget',
                'getMethod',
                'withMethod',
                'getUri',
                'withUri',
            ])
            ->getMock()
        ;
    }

    private function destroyRequest(): void
    {
        $this->request = null;
    }

    private function buildBody(): void
    {
        $this->body = $this->getMockBuilder(StreamInterface::class)
            ->disableOriginalConstructor()
            ->setMethods([
                '__toString',
                'close',
                'detach',
                'getSize',
                'tell',
                'eof',
                'isSeekable',
                'seek',
                'rewind',
                'isWritable',
                'write',
                'isReadable',
                'read',
                'getContents',
                'getMetadata',
            ])
            ->getMock()
        ;
    }

    private function destroyBody(): void
    {
        $this->body = null;
    }

    private function buildRequestHandler(): void
    {
        $this->requestHandler = $this->getMockBuilder(RequestHandlerInterface::class)
            ->disableOriginalConstructor()
            ->setMethods(['handle'])
            ->getMock()
        ;
    }

    private function destroyRequestHandler(): void
    {
        $this->requestHandler = null;
    }

    private function buildUri(): void
    {
        $this->uri = $this->getMockBuilder(UriInterface::class)
            ->disableOriginalConstructor()
            ->setMethods([
                'getScheme',
                'getAuthority',
                'getUserInfo',
                'getHost',
                'getPort',
                'getPath',
                'getQuery',
                'getFragment',
                'withScheme',
                'withUserInfo',
                'withHost',
                'withPort',
                'withPath',
                'withQuery',
                'withFragment',
                '__toString',
            ])
            ->getMock()
        ;
    }

    private function destroyUri(): void
    {
        $this->uri = null;
    }

    private function buildUploadedFile(): void
    {
        $this->uploadedFile = $this->getMockBuilder(UploadedFileInterface::class)
            ->disableOriginalConstructor()
            ->setMethods([
                'getStream',
                'moveTo',
                'getSize',
                'getError',
                'getClientFilename',
                'getClientMediaType',
            ])
            ->getMock()
        ;
    }

    private function destroyUploadedFile(): void
    {
        $this->uploadedFile = null;
    }
}
