<?php
declare(strict_types=1);

namespace Tests\Unit\Http\Controllers\Auth\LogIn;

use App\Http\Controllers\Auth\LogIn\PostLogIn;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LogIn\StoreRequest;
use App\Http\Responses\Auth\LogIn\StoreFailedResponse;
use App\Http\Responses\Auth\LogIn\StoreResponse;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Contracts\Support\MessageProvider;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Routing\Redirector;
use Mockery as M;
use Tests\TestCase;

/**
 * Class PostLogInTest
 * @package Tests\Unit\Http\Controllers\Auth\LogIn
 * @group controller
 */
class PostLogInTest extends TestCase
{
    /** @var StatefulGuard|M\Mock */
    private $auth;

    /** @var PostLogIn */
    private $controller;

    /** @var Validator|M\Mock */
    private $validator;

    public function setUp()
    {
        /** @var AuthManager|M\Mock $authManager */
        $authManager = M::mock(AuthManager::class);
        $this->auth = M::mock(StatefulGuard::class);
        $authManager->shouldReceive('guard')->andReturn($this->auth);

        /** @var Factory|M\Mock $factory */
        $factory = M::mock(Factory::class);
        $this->validator = M::mock(Validator::class);
        $factory->shouldReceive('make')->andReturn($this->validator);

        $this->controller = new PostLogIn($authManager, $factory);
    }

    public function testInstance()
    {
        $this->assertInstanceOf(Controller::class, $this->controller);
    }

    public function test__invoke()
    {
        /** @var Redirector|M\Mock $redirector */
        $redirector = M::mock(Redirector::class);

        /** @var StoreRequest|M\Mock $request */
        $request = M::mock(StoreRequest::class);
        $request->shouldReceive('filled')->andReturn(true);
        $request->shouldReceive('only')->andReturn([]);

        /** @var Translator|M\Mock $translator */
        $translator = M::mock(Translator::class);
        $translator->shouldReceive('trans')->andReturn('');

        $this->auth->shouldReceive('attempt')->andReturn(true);

        $result = $this->controller->__invoke($redirector, $request, $translator);

        $this->assertInstanceOf(StoreResponse::class, $result);
    }

    public function test__invokeFailed()
    {
        /** @var Redirector|M\Mock $redirector */
        $redirector = M::mock(Redirector::class);

        /** @var StoreRequest|M\Mock $request */
        $request = M::mock(StoreRequest::class);
        $request->shouldReceive('filled')->andReturn(true);
        $request->shouldReceive('only')->andReturn([]);

        /** @var Translator|M\Mock $translator */
        $translator = M::mock(Translator::class);
        $translator->shouldReceive('trans')->andReturn('');

        $this->auth->shouldReceive('attempt')->andReturn(false);

        $messageProvider = M::mock(MessageProvider::class);

        $messageBag = M::mock(MessageBag::class);
        $messageBag->shouldReceive('add')->andReturn($messageProvider);
        $this->validator->shouldReceive('errors')->andReturn($messageBag);

        $result = $this->controller->__invoke($redirector, $request, $translator);

        $this->assertInstanceOf(StoreFailedResponse::class, $result);
    }
}
