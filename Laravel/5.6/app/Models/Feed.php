<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Feed
 * @package App\Models
 */
final class Feed extends Model
{
    /**
     * @var string
     */
    protected $table = 'feeds';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'url',
        'title',
        'link',
        'description'
    ];

    /**
     * @param int $id
     */
    public function setUserId(int $id): void
    {
        $this->setAttribute('user_id', $id);
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->setAttribute('url', $url);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->getAttribute('url');
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->getAttribute('user_id');
    }
}
