<?php
declare(strict_types=1);

namespace App\UseCases\Feed;

use App\Repositories\FeedRepository;
use App\UseCases\UseCaseInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FindAllUnspecifiedFeed
 * @package App\UseCases\Feed
 */
final class FindAllUnspecifiedFeed implements UseCaseInterface
{
    /**
     * @var int
     */
    private $perPage = 20;

    /**
     * @var int
     */
    private $page;

    /**
     * @param Model $model
     * @return mixed
     */
    public function run(Model $model): array
    {
        return (new FeedRepository)->paginate($model, $this->perPage, $this->page);
    }

    /**
     * @param int $perPage
     */
    public function setPerPage(int $perPage): void
    {
        $this->perPage = $perPage;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }
}
