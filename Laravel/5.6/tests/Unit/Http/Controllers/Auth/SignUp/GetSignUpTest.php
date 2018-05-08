<?php
declare(strict_types=1);

namespace Tests\Unit\Http\Controllers\Auth\SignUp;

use App\Http\Controllers\Auth\SignUp\GetSignUp;
use App\Http\Responses\Auth\SignUp\IndexResponse;
use Illuminate\Contracts\Support\Responsable;
use Mockery as M;
use Tests\TestCase;

/**
 * Class GetSignUpTest
 * @package Tests\Unit\Http\Controllers\Auth\SignUp
 * @group controller
 */
class GetSignUpTest extends TestCase
{
    public function test__invoke()
    {
        $response = M::mock(IndexResponse::class);

        $result = (new GetSignUp)($response);

        $this->assertInstanceOf(Responsable::class, $result);
    }
}
