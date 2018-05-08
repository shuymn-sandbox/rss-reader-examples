<?php
declare(strict_types=1);

namespace Tests\Unit\Http\Controllers\Feed\Create;

use App\Http\Controllers\Feed\Create\GetCreate;
use App\Http\Responses\Feed\Create\IndexResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\Factory;
use Mockery as M;
use Tests\TestCase;

/**
 * Class GetCreateTest
 * @package Tests\Unit\Http\Controllers\Feed\Create
 * @group controller
 */
class GetCreateTest extends TestCase
{
    public function test__invoke()
    {
        /** @var Factory|M\Mock $view */
        $view = M::mock(Factory::class);
        /** @var IndexResponse|M\Mock $response */
        $response = M::mock(IndexResponse::class, [$view]);

        $result = (new GetCreate)($response);

        $this->assertInstanceOf(Responsable::class, $result);
    }
}
