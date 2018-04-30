<?php
declare(strict_types=1);

namespace App\Http\Controllers\Auth\LogIn;

use App\Http\Controllers\Controller;
use App\Http\Responses\Auth\LogIn\IndexResponse;
use Illuminate\Contracts\Support\Responsable;

/**
 * Class GetLogIn
 * @package App\Http\Controllers\Auth\LogIn
 */
class GetLogIn extends Controller
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
