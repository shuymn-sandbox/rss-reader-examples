<?php
declare(strict_types=1);

namespace App\Http\Responses\Auth\SignUp;

use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class StoreResponse
 * @package App\Http\Responses\Auth\SignUp
 */
class StoreResponse implements Responsable
{
    /** @var \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard */
    protected $auth;

    /** @var Redirector */
    protected $redirector;

    /** @var User */
    protected $user;

    /**
     * StoreResponse constructor.
     * @param AuthManager $authManager
     * @param Redirector $redirector
     * @param User $user
     */
    public function __construct(AuthManager $authManager, Redirector $redirector, User $user)
    {
        $this->auth = $authManager->guard('web');
        $this->redirector = $redirector;
        $this->user = $user;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toResponse($request): RedirectResponse
    {
        $this->auth->login($this->user);

        return $this->redirector->route('home');
    }
}
