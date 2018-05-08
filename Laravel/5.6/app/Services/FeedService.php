<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\Feed;
use App\UseCases\Feed\FindAllUnspecifiedFeed;
use App\UseCases\Feed\RegistrationOfFeed;

/**
 * Class FeedService
 * @package App\Services
 */
final class FeedService
{
    /**
     * @var RegistrationOfFeed
     */
    private $registrationOfFeed;

    /**
     * @var FindAllUnspecifiedFeed
     */
    private $findAllUnspecifiedFeed;

    /**
     * FeedService constructor.
     * @param RegistrationOfFeed $registrationOfFeed
     * @param FindAllUnspecifiedFeed $findAllUnspecifiedFeed
     */
    public function __construct(
        RegistrationOfFeed $registrationOfFeed,
        FindAllUnspecifiedFeed $findAllUnspecifiedFeed
    )
    {
        $this->registrationOfFeed = $registrationOfFeed;
        $this->findAllUnspecifiedFeed = $findAllUnspecifiedFeed;
    }

    /**
     * @param int $userId
     * @param string $url
     * @return Feed
     * @throws \App\Exceptions\InvalidUrlException
     */
    public function register(int $userId, string $url): Feed
    {
        $newFeed = new Feed;
        $newFeed->setUserId($userId);
        $newFeed->setUrl($url);

        if (!$this->registrationOfFeed->run($newFeed)) {
            throw new \RuntimeException('Feed creation was failed.');
        }

        return $newFeed;
    }

    /**
     * @param int $page
     * @return array
     */
    public function paginate(int $page): array
    {
        $this->findAllUnspecifiedFeed->setPage($page);
        return $this->findAllUnspecifiedFeed->run(new Feed);
    }
}
