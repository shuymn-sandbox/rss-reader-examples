<?php
declare(strict_types=1);

namespace App\Http\Responses\Auth\LogOut;

use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class IndexResponse
 * @package App\Http\Responses\Auth\LogOut
 */
class IndexResponse implements Responsable
{
    /** @var \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard */
    protected $auth;

    /** @var Redirector */
    protected $redirector;

    /**
     * IndexResponse constructor.
     * @param AuthManager $authManager
     * @param Redirector $redirector
     */
    public function __construct(AuthManager $authManager, Redirector $redirector)
    {
        $this->auth = $authManager->guard('web');
        $this->redirector = $redirector;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function toResponse($request): RedirectResponse
    {
        $this->auth->logout();

        $request->session()->invalidate();

        return $this->redirector->route('home');
    }
}
