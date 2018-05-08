<?php
declare(strict_types=1);

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feed\IndexRequest;
use App\Http\Responses\Feed\IndexResponse;
use App\Services\FeedService;
use Illuminate\Contracts\Support\Responsable;

/**
 * Class GetFeed
 * @package App\Http\Controllers\Feed
 */
final class GetFeed extends Controller
{
    /**
     * @param IndexRequest $request
     * @param IndexResponse $response
     * @param FeedService $service
     * @return Responsable
     */
    public function __invoke(IndexRequest $request, IndexResponse $response, FeedService $service): Responsable
    {
        $page = $request->get('page', 1);
        $feeds = $service->paginate($page);
        $response->setFeeds($feeds);

        return $response;
    }
}
