<?php
declare(strict_types=1);

namespace App\Http\Controllers\Auth\SignUp;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUp\StoreRequest;
use App\Http\Responses\Auth\SignUp\StoreResponse;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Hashing\HashManager;
use Illuminate\Routing\Redirector;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class PostSignUp
 * @package App\Http\Controllers\Auth\SignUp
 */
final class PostSignUp extends Controller
{
    /**
     * @var \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    private $auth;

    /**
     * @var \Illuminate\Hashing\BcryptHasher
     */
    private $hash;

    /**
     * PostSignUp constructor.
     * @param AuthManager $authManager
     * @param HashManager $hashManager
     */
    public function __construct(AuthManager $authManager ,HashManager $hashManager)
    {
        $this->auth = $authManager->guard('web');
        $this->hash = $hashManager->createBcryptDriver();
    }

    /**
     * @param StoreRequest $request
     * @param UserService $service
     * @return RedirectResponse
     * @throws \Exception
     */
    public function __invoke(StoreRequest $request, UserService $service): RedirectResponse
    {
        $username = $request->get('username');
        $nickname = $request->get('nickname');
        $email = $request->get('email');
        $password = $this->hash->make($request->get('password'));

        try {
            $service->register($username, $nickname, $email, $password);

            return redirect(route('home'));
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
