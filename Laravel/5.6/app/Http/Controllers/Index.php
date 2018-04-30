<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Responses\IndexResponse;
use App\Models\Entry;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\Factory;

/**
 * Class Index
 * @package App\Http\Controllers
 */
class Index extends Controller
{
    /**
     * @param AuthManager $authManager
     * @param Factory $view
     * @return Responsable
     */
    public function __invoke(AuthManager $authManager, Factory $view): Responsable
    {
        $entries = Entry::all();

        return new IndexResponse($authManager, $entries, $view);
    }
}
