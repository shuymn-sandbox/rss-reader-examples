<?php
declare(strict_types=1);

namespace App\UseCases\Entry;

use App\Repositories\EntryRepository;
use App\UseCases\UseCaseInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FindAllUnspecifiedEntry
 * @package App\UseCases\Entry
 */
final class FindAllUnspecifiedEntry implements UseCaseInterface
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
     * @return array
     */
    public function run(Model $model): array
    {
        return (new EntryRepository)->paginate($model, $this->perPage, $this->page);
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
