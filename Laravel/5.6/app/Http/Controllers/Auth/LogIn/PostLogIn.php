<?php
declare(strict_types=1);

namespace App\Http\Controllers\Auth\LogIn;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LogIn\StoreRequest;
use App\Http\Responses\Auth\LogIn\StoreResponse;
use App\Http\Responses\Feed\StoreFailedResponse;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

/**
 * Class PostLogIn
 * @package App\Http\Controllers\Auth\LogIn
 */
class PostLogIn extends Controller
{
    /** @var \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard */
    protected $auth;

    /** @var \Illuminate\Contracts\Validation\Validator */
    protected $validator;

    /**
     * PostLogIn constructor.
     * @param AuthManager $authManager
     * @param Factory $factory
     */
    public function __construct(AuthManager $authManager, Factory $factory)
    {
        $this->auth = $authManager->guard('web');
        $this->validator = $factory->make([], []);
    }

    /**
     * @param Redirector $redirector
     * @param StoreRequest $request
     * @return Responsable
     */
    public function __invoke(Redirector $redirector, StoreRequest $request): Responsable
    {
        if (!$this->attempt($request)) {
            $messageBag = $this->validator->errors()->add('email', __('auth.failed'));

            return new StoreFailedResponse($messageBag, $redirector);
        }

        return new StoreResponse($redirector);
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function attempt(Request $request): bool
    {
        return $this->auth->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request): array
    {
        return $request->only('email', 'password');
    }
}
