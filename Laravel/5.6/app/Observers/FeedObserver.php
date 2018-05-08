<?php
declare(strict_types=1);

namespace App\Observers;

use App\Models\Feed;

/**
 * Class FeedObserver
 * @package App\Observers
 */
final class FeedObserver
{
    /**
     * @param Feed $feed
     */
    public function created(Feed $feed): void
    {
    }
}
