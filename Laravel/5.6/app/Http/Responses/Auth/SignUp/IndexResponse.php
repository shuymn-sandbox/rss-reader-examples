<?php
declare(strict_types=1);

namespace App\Http\Responses\Auth\SignUp;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;

/**
 * Class IndexResponse
 * @package App\Http\Responses\Auth\SignUp
 */
class IndexResponse implements Responsable
{
    /** @var Factory */
    private $view;

    /**
     * IndexResponse constructor.
     * @param Factory $view
     */
    public function __construct(Factory $view)
    {
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
            $this->view->make('auth.signup')
        );
    }
}
