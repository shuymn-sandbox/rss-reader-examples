<?php
declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;

/**
 * Class IndexResponse
 * @package App\Http\Responses
 */
class IndexResponse implements Responsable
{
    /** @var \App\Models\User|null */
    protected $user;

    /** @var \App\Models\Entry[] */
    protected $entries;

    /** @var Factory */
    protected $view;

    /**
     * IndexResponse constructor.
     * @param AuthManager $authManager
     * @param Factory $view
     */
    public function __construct(AuthManager $authManager, Factory $view)
    {
        $this->user = $authManager->guard('web')->user();
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
            $this->view->make('index', $this->createResponseData())
        );
    }

    /**
     * @return array
     */
    private function createResponseData(): array
    {
        return [
            'entries' => $this->entries,
            'name' => is_null($this->user) ? '' : $this->user->getName()
        ];
    }

    /**
     * @param array $entries
     */
    public function setEntries(array $entries): void
    {
        $this->entries = $entries;
    }
}
