<?php
declare(strict_types=1);

namespace Tests\Unit\Http\Requests\Auth\LogIn;

use App\Http\Requests\Auth\LogIn\StoreRequest;
use Illuminate\Foundation\Http\FormRequest;
use Tests\TestCase;

/**
 * Class StoreRequestTest
 * @package Tests\Unit\Http\Requests\Auth\LogIn
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
        $this->assertInstanceOf(FormRequest::class, $this->request);
    }

    public function testRules()
    {
        $this->assertArrayHasKey('email', $this->request->rules());
        $this->assertArrayHasKey('password', $this->request->rules());
    }

    public function testAuthorize()
    {
        $this->assertTrue($this->request->authorize());
    }
}
