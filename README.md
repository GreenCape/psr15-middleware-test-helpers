[![Code Coverage](https://scrutinizer-ci.com/g/vmpublishing/psr15-middleware-test-helpers/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/vmpublishing/psr15-middleware-test-helpers/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vmpublishing/psr15-middleware-test-helpers/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/vmpublishing/psr15-middleware-test-helpers/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/vmpublishing/psr15-middleware-test-helpers/badges/build.png?b=master)](https://scrutinizer-ci.com/g/vmpublishing/psr15-middleware-test-helpers/build-status/master)


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
