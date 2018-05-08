<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Exceptions\InvalidUrlException;
use App\Models\Feed;
use Illuminate\Database\Eloquent\Model;
use SimplePie;

/**
 * Class FeedRepository
 * @package App\Repositories
 */
final class FeedRepository
{
    /**
     * @param Model $feed
     * @return bool
     * @throws InvalidUrlException
     */
    public function create(Model $feed): bool
    {
        if (!$feed instanceof Feed) {
            throw new \RuntimeException('Not match Feed');
        }

        $parser = new SimplePie;
        $parser->set_feed_url($feed->getUrl());
        $parser->enable_cache(false);

        if (!$parser->init()) {
            throw new InvalidUrlException('Invalid URL');
        }

        return $feed->save();
    }

    /**
     * @param Model $model
     * @param int $perPage
     * @param int $page
     * @return array
     */
    public function paginate(Model $model, int $perPage, int $page): array
    {
        /** @var \Illuminate\Pagination\LengthAwarePaginator $feeds */
        $feeds = $model->newQuery()->paginate($perPage, ['*'], 'page', $page);

        return $feeds->all();
    }
}
