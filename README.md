
**WHAT**

a collection of reusable mocks for phpunit for the common middleware-related interfaces

**INSTALL**

To install simply use
`composer require vmpublishing/psr15-middleware-test-helpers`

**USE**

As these are traits, just use them inside your testcase:

```

class SomeTest extends TestCase
{
    use VM\Psr15Mocks\Middleware; // include to use
    // this will generate the member variables:
    // $request
    // $response
    // $requestHandler
    // $body

    // ..

    // create them all properly
    public function setUp(): void
    {
        $this->buildResponse();
        $this->buildRequest();
        $this->buildRequestHandler();
        $this->buildBody();
    }

    // destroy them all properly
    public function tearDown(): void
    {
        $this->destroyBody();
        $this->destroyRequestHandler();
        $this->destroyRequest();
        $this->destroyResponse();
    }

    // ..

    public function testSomething(): void
    {
        // use to validate calls
        $this->response->expects($this->once())->method('getBody')->willReturn($this->body);
    }
}
