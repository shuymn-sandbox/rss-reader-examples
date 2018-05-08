<?php
declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EntryRepository
 * @package App\Repositories
 */
final class EntryRepository
{
    /**
     * @param Model $model
     * @param int $perPage
     * @param int $page
     * @return array
     */
    public function paginate(Model $model, int $perPage, int $page): array
    {
        /** @var \Illuminate\Pagination\LengthAwarePaginator $entries */
        $entries = $model->newQuery()->paginate($perPage, ['*'], 'page', $page);
        return $entries->all();
    }
}
