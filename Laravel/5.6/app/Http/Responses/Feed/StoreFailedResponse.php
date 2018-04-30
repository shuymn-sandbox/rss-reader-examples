<?php
declare(strict_types=1);

namespace App\Http\Responses\Feed;

use Illuminate\Contracts\Support\MessageProvider;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class StoreFailedResponse
 * @package App\Http\Responses\Feed
 */
class StoreFailedResponse implements Responsable
{
    /** @var MessageProvider */
    protected $messageProvider;

    /** @var Redirector */
    protected $redirector;

    /**
     * StoreFailedResponse constructor.
     * @param MessageProvider $messageProvider
     * @param Redirector $redirector
     */
    public function __construct(MessageProvider $messageProvider, Redirector $redirector)
    {
        $this->messageProvider = $messageProvider;
        $this->redirector = $redirector;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request $request
     * @return RedirectResponse
     */
    public function toResponse($request): RedirectResponse
    {
        return $this->redirector->back()->withErrors($this->messageProvider)->withInput();
    }
}
