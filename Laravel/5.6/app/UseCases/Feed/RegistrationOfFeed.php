<?php
declare(strict_types=1);

namespace App\UseCases\Feed;

use App\Repositories\FeedRepository;
use App\UseCases\UseCaseInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RegistrationOfFeed
 * @package App\UseCases\Feed
 */
final class RegistrationOfFeed implements UseCaseInterface
{
    /**
     * @param Model $model
     * @return bool
     * @throws \App\Exceptions\InvalidUrlException
     */
    public function run(Model $model): bool
    {
        return (new FeedRepository)->create($model);
    }
}
