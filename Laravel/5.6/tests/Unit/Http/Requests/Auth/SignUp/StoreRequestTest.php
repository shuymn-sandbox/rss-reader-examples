<?php

namespace Tests\Unit\Http\Requests\Auth\SignUp;

use App\Http\Requests\Auth\SignUp\StoreRequest;
use Illuminate\Http\Request;
use Tests\TestCase;

/**
 * Class StoreRequestTest
 * @package Tests\Unit\Http\Requests\Auth\SignUp
 */
class StoreRequestTest extends TestCase
{
    /** @var StoreRequest */
    private $request;

    public function setUp()
    {
        $this->request = new StoreRequest;
    }

    public function testInstance()
    {
        $this->assertInstanceOf(Request::class, $this->request);
    }

    public function testAuthorize()
    {
        $this->assertTrue($this->request->authorize());
    }

    public function testRules()
    {
        $this->assertArrayHasKey('username', $this->request->rules());
        $this->assertArrayHasKey('nickname', $this->request->rules());
        $this->assertArrayHasKey('email', $this->request->rules());
        $this->assertArrayHasKey('password', $this->request->rules());
    }
}
