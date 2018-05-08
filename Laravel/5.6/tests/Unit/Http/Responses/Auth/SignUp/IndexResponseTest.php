<?php
declare(strict_types=1);

namespace Tests\Unit\Http\Responses\Auth\SignUp;

use App\Http\Responses\Auth\SignUp\IndexResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mockery as M;
use Tests\TestCase;

/**
 * Class IndexResponseTest
 * @package Tests\Unit\Http\Responses\Auth\SignUp
 * @group response
 */
class IndexResponseTest extends TestCase
{
    /** @var IndexResponse */
    private $response;

    /** @var Factory|M\Mock */
    private $view;

    public function setUp()
    {
        $this->view = M::mock(Factory::class);
        $this->response = new IndexResponse($this->view);
    }

    public function testInstance()
    {
        $this->assertInstanceOf(Responsable::class, $this->response);
    }

    public function testToResponse()
    {
        $this->view->shouldReceive('make');

        M::mock('overload:' . Response::class);

        /** @var Request|M\Mock $request */
        $request = M::mock(Request::class);
        $result = $this->response->toResponse($request);

        $this->assertInstanceOf(Response::class, $result);
    }
}
