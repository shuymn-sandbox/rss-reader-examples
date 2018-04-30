<?php
declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

/**
 * Class IndexResponse
 * @package App\Http\Responses
 */
class IndexResponse implements Responsable
{
    /** @var \App\Models\User */
    protected $user;

    /** @var \App\Models\Entry[]|Collection */
    protected $entries;

    /** @var Factory */
    protected $view;

    /**
     * IndexResponse constructor.
     * @param AuthManager $authManager
     * @param Collection $entries
     * @param Factory $view
     */
    public function __construct(AuthManager $authManager, Collection $entries, Factory $view)
    {
        $this->user = $authManager->guard('web')->user();
        $this->entries = $entries;
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
            $this->view->make('index', [
                'entries' => $this->entries,
                'username' => $this->user->username
            ])
        );
    }
}
