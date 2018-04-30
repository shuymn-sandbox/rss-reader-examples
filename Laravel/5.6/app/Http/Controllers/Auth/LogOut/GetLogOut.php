<?php
declare(strict_types=1);

namespace App\Http\Controllers\Auth\LogOut;

use App\Http\Controllers\Controller;
use App\Http\Responses\Auth\LogOut\IndexResponse;
use Illuminate\Contracts\Support\Responsable;

/**
 * Class GetLogOut
 * @package App\Http\Controllers
 */
class GetLogOut extends Controller
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
