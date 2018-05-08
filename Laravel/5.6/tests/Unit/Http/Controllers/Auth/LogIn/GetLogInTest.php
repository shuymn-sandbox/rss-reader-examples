<?php
declare(strict_types=1);

namespace Tests\Unit\Http\Controllers\Auth\LogIn;

use App\Http\Controllers\Auth\LogIn\GetLogIn;
use App\Http\Responses\Auth\LogIn\IndexResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\Factory;
use Mockery as M;
use Tests\TestCase;

/**
 * Class GetLogInTest
 * @package Tests\Unit\Http\Controllers\Auth\LogIn
 * @group controller
 */
class GetLogInTest extends TestCase
{
    public function test__invoke()
    {
        $view = M::mock(Factory::class);
        $response = M::mock(IndexResponse::class, [$view]);

        $result = (new GetLogIn)($response);

        $this->assertInstanceOf(Responsable::class, $result);
    }
}
