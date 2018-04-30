<?php
declare(strict_types=1);

namespace App\Http\Controllers\Auth\SignUp;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUp\StoreRequest;
use App\Http\Responses\Auth\SignUp\StoreResponse;
use App\Models\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Hashing\HashManager;
use Illuminate\Routing\Redirector;

/**
 * Class PostSignUp
 * @package App\Http\Controllers\Auth\SignUp
 */
class PostSignUp extends Controller
{
    /** @var \Illuminate\Hashing\BcryptHasher */
    protected $hash;

    /**
     * PostSignUp constructor.
     * @param HashManager $hashManager
     */
    public function __construct(HashManager $hashManager)
    {
        $this->hash = $hashManager->createBcryptDriver();
    }

    /**
     * @param AuthManager $authManager
     * @param Redirector $redirector
     * @param StoreRequest $request
     * @return Responsable
     */
    public function __invoke(AuthManager $authManager, Redirector $redirector, StoreRequest $request): Responsable
    {
        $data = $request->all();

        /** @var User $user */
        $user = User::create([
            'username' => $data['username'],
            'nickname' => $data['nickname'],
            'email' => $data['email'],
            'password' => $this->hash->make($data['password']),
        ]);

        return new StoreResponse($authManager, $redirector, $user);
    }
}
