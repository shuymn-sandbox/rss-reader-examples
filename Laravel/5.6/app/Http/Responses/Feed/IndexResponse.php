<?php
declare(strict_types=1);

namespace App\Http\Responses\Feed;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;

class IndexResponse implements Responsable
{
    /** @var Factory */
    protected $factory;

    /**
     * IndexResponse constructor.
     * @param Factory $factory
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
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
            $this->factory->make('feed')
        );
    }
}
