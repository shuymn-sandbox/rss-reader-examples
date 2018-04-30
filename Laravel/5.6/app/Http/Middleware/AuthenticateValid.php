<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;

/**
 * Class AuthenticateValid
 * @package App\Http\Middleware
 */
class AuthenticateValid
{
    /** @var \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard */
    protected $auth;

    /**
     * AuthenticateValid constructor.
     * @param AuthManager $authManager
     */
    public function __construct(AuthManager $authManager)
    {
        $this->auth = $authManager->guard('web');
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->auth->guest()) {
            return redirect(route('home'));
        }

        return $next($request);
    }
}
