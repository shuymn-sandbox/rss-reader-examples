<?php
declare(strict_types=1);

namespace App\Http\Responses\Auth\SignUp;

use Illuminate\Contracts\Support\Responsable;

/**
 * Class IndexResponse
 * @package App\Http\Responses\Auth\SignUp
 */
class IndexResponse implements Responsable
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return view('auth.signup');
    }
}
