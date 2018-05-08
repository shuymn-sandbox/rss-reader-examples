<?php
declare(strict_types=1);

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\Index;
use App\Http\Responses\IndexResponse;
use App\Models\Entry;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\Factory;
use Mockery as M;
use Tests\TestCase;

/**
 * Class IndexTest
 * @package Tests\Unit\Http\Controllers
 * @group controller
 */
class IndexTest extends TestCase
{
    public function test__invoke()
    {
        $authManager = M::mock(AuthManager::class);
        $guard = M::mock(StatefulGuard::class);
        $guard->shouldReceive('user');
        $authManager->shouldReceive('guard')->andReturn($guard);

        $view = M::mock(Factory::class);

        $entry = M::mock('alias:' . Entry::class);
        $entry->shouldReceive('all');

        M::mock('overload:' . IndexResponse::class, Responsable::class);

        $result = (new Index)($authManager, $view);

        $this->assertInstanceOf(Responsable::class, $result);
    }
}
