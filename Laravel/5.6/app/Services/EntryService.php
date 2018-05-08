<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Entry;
use App\UseCases\Entry\FindAllUnspecifiedEntry;
use IteratorAggregate;

/**
 * Class EntryService
 * @package App\Services
 */
final class EntryService
{
    /**
     * @var FindAllUnspecifiedEntry
     */
    private $findAllUnspecifiedEntry;

    /**
     * EntryService constructor.
     * @param FindAllUnspecifiedEntry $findAllUnspecifiedEntry
     */
    public function __construct(FindAllUnspecifiedEntry $findAllUnspecifiedEntry)
    {
        $this->findAllUnspecifiedEntry = $findAllUnspecifiedEntry;
    }

    /**
     * @param int $page
     * @return array
     */
    public function paginate(int $page = 1): array
    {
        $this->findAllUnspecifiedEntry->setPage($page);

        return $this->findAllUnspecifiedEntry->run(new Entry);
    }
}
