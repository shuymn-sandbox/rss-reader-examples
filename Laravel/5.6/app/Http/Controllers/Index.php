<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Http\Responses\IndexResponse;
use App\Services\EntryService;
use Illuminate\Contracts\Support\Responsable;

/**
 * Class Index
 * @package App\Http\Controllers
 */
class Index extends Controller
{
    /**
     * @param IndexRequest $request
     * @param IndexResponse $response
     * @param EntryService $service
     * @return Responsable
     */
    public function __invoke(IndexRequest $request, IndexResponse $response, EntryService $service): Responsable
    {
        $entries = $service->paginate();
        $response->setEntries($entries);

        return $response;
    }
}
