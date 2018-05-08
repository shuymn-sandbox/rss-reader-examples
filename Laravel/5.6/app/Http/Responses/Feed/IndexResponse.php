<?php
declare(strict_types=1);

namespace App\Http\Responses\Feed;

use App\Http\Responses\IndexResponseInterface;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;

/**
 * Class IndexResponse
 * @package App\Http\Responses\Feed
 */
class IndexResponse implements IndexResponseInterface
{
    /** @var \App\Models\Feed[] */
    protected $feeds;

    /** @var \App\Models\User */
    protected $user;

    /** @var Factory */
    protected $view;

    /**
     * IndexResponse constructor.
     * @param AuthManager $authManager
     * @param Factory $view
     */
    public function __construct(AuthManager $authManager, Factory $view)
    {
        $this->user = $authManager->guard('web')->user();
        $this->view = $view;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request): Response
    {
        return new Response(
            $this->view->make('feed.index', $this->createResponseData())
        );
    }

    /**
     * @return array
     */
    public function createResponseData(): array
    {
        return [
            'feeds' => $this->feeds,
            'name' => is_null($this->user) ? '' : $this->user->getName()
        ];
    }

    /**
     * @param array $feeds
     */
    public function setFeeds(array $feeds): void
    {
        $this->feeds = $feeds;
    }
}
