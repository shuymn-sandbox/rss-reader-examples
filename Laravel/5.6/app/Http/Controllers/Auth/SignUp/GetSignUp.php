<?php
declare(strict_types=1);

namespace App\Http\Controllers\Auth\SignUp;

use App\Http\Controllers\Controller;
use App\Http\Responses\Auth\SignUp\IndexResponse;
use Illuminate\Contracts\Support\Responsable;

/**
 * Class GetSignUp
 * @package App\Http\Controllers\Auth\SignUp
 */
final class GetSignUp extends Controller
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
