<?php
declare(strict_types=1);

namespace Tests\Unit\Http\Controllers\Feed;

use App\Http\Controllers\Feed\GetFeed;
use Illuminate\Contracts\Support\Responsable;
use Mockery as M;
use Tests\TestCase;

/**
 * Class GetFeedTest
 * @package Tests\Unit\Http\Controllers\Feed
 * @group controller
 */
class GetFeedTest extends TestCase
{
    public function test__invoke()
    {
        $this->assertTrue(true);
    }
}
