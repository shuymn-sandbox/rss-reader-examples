<?php
declare(strict_types=1);

namespace Tests\Unit\Http\Controllers\Auth\SignUp;

use App\Http\Controllers\Auth\SignUp\PostSignUp;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUp\StoreRequest;
use App\Http\Responses\Auth\SignUp\StoreResponse;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Hashing\HashManager;
use Illuminate\Routing\Redirector;
use Mockery as M;
use Tests\TestCase;

/**
 * Class PostSignUpTest
 * @package Tests\Unit\Http\Controllers\Auth\SignUp
 * @group controller
 */
class PostSignUpTest extends TestCase
{
    /** @var PostSignUp */
    private $controller;

    public function setUp()
    {
        /** @var HashManager|M\Mock $hashManager */
        $hashManager = M::mock(HashManager::class);
        $hasher = M::mock(BcryptHasher::class);
        $hasher->shouldReceive('make')->andReturn('');
        $hashManager->shouldReceive('createBcryptDriver')->andReturn($hasher);

        $this->controller = new PostSignUp($hashManager);
    }

    public function testInstance()
    {
        $this->assertInstanceOf(Controller::class, $this->controller);
    }

    public function test__invoke()
    {
        /** @var AuthManager|M\Mock $authManager */
        $authManager = M::mock(AuthManager::class);
        /** @var Redirector|M\Mock $redirector */
        $redirector = M::mock(Redirector::class);
        /** @var StoreRequest|M\Mock $request */
        $request = M::mock(StoreRequest::class);
        $request->shouldReceive('all')->andReturn($this->getStoreRequestData());

        /** @var User|M\Mock $user */
        $user = M::mock('alias:' . User::class);
        $user->shouldReceive('create')->andReturn($user);

        M::mock('overload:' . StoreResponse::class, Responsable::class);

        $result = $this->controller->__invoke($authManager, $redirector, $request);

        $this->assertInstanceOf(Responsable::class, $result);
    }

    /**
     * @return array
     */
    private function getStoreRequestData(): array
    {
        return [
            'username' => '',
            'nickname' => '',
            'email' => '',
            'password' => '',
        ];
    }
}
