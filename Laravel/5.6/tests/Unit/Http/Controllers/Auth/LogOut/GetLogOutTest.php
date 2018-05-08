<?php
declare(strict_types=1);

namespace Tests\Unit\Http\Controllers\Auth\LogOut;

use App\Http\Controllers\Auth\LogOut\GetLogOut;
use App\Http\Responses\Auth\LogOut\IndexResponse;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Routing\Redirector;
use Mockery as M;
use Tests\TestCase;

/**
 * Class GetLogOutTest
 * @package Tests\Unit\Http\Controllers\Auth\LogOut
 * @group controller
 */
class GetLogOutTest extends TestCase
{
    public function test__invoke()
    {
        $authManager = M::mock(AuthManager::class);
        $authManager->shouldReceive('guard');

        $redirector = M::mock(Redirector::class);
        $response = M::mock(IndexResponse::class, [$authManager, $redirector]);

        $result = (new GetLogOut)($response);

        $this->assertInstanceOf(Responsable::class, $result);
    }
}
