<?php
declare(strict_types=1);

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feed\StoreRequest;
use App\Http\Responses\Feed\StoreResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Routing\Redirector;

/**
 * Class PostFeed
 * @package App\Http\Controllers\Feed
 */
class PostFeed extends Controller
{
    /**
     * @param Redirector $redirector
     * @param StoreRequest $request
     * @return Responsable
     */
    public function __invoke(Redirector $redirector, StoreRequest $request): Responsable
    {
        return new StoreResponse($redirector);
    }
}
