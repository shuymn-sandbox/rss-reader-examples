<?php
declare(strict_types=1);

namespace App\Http\Controllers\Feed\Create;

use App\Http\Controllers\Controller;
use App\Http\Responses\Feed\Create\IndexResponse;
use Illuminate\Contracts\Support\Responsable;

/**
 * Class GetCreate
 * @package App\Http\Controllers\Feed\Create
 */
class GetCreate extends Controller
{
    /**
     * @param IndexResponse $response
     * @return Responsable
     */
    public function __invoke(IndexResponse $response): Responsable
    {
        return $response;
    }
}
