<?php
declare(strict_types=1);

namespace App\Http\Responses\Auth\LogIn;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class StoreResponse
 * @package App\Http\Responses\Auth\LogIn
 */
class StoreResponse implements Responsable
{
    /** @var Redirector */
    protected $redirector;

    /**
     * StoreResponse constructor.
     * @param Redirector $redirector
     */
    public function __construct(Redirector $redirector)
    {
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
        $request->session()->regenerate();

        return $this->redirector->intended();
    }
}
