<?php
declare(strict_types=1);

namespace App\Http\Controllers\Feed;

use App\Exceptions\InvalidUrlException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Feed\StoreRequest;
use App\Services\FeedService;
use Illuminate\Auth\AuthManager;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class PostFeed
 * @package App\Http\Controllers\Feed
 */
final class PostFeed extends Controller
{
    /**
     * @var \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    private $auth;

    /**
     * PostFeed constructor.
     * @param AuthManager $authManager
     */
    public function __construct(AuthManager $authManager)
    {
        $this->auth = $authManager->guard('web');
    }

    /**
     * @param StoreRequest $request
     * @param FeedService $service
     * @return RedirectResponse
     * @throws \Exception
     */
    public function __invoke(StoreRequest $request, FeedService $service): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $this->auth->user();
        $url = $request->get('url');

        try {
            $service->register($user->getId(), $url);

            return redirect(route('feed'));
        } catch (\Exception $e) {
            if ($e instanceof InvalidUrlException) {
                return redirect(route('feed.create'))
                    ->withErrors([trans('message.feed.create.failure')]);
            }

            throw $e;
        }
    }
}
