<?php
declare(strict_types=1);

namespace App\Http\Controllers\Auth\LogOut;

use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class GetLogOut
 * @package App\Http\Controllers
 */
final class GetLogOut extends Controller
{
    /**
     * @var \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    private $auth;

    /**
     * GetLogOut constructor.
     * @param AuthManager $authManager
     */
    public function __construct(AuthManager $authManager)
    {
        $this->auth = $authManager->guard('web');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $this->auth->logout();
        $request->session()->invalidate();

        return redirect(route('home'));
    }
}
