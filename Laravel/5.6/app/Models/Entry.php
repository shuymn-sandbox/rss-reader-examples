<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entry
 * @package App\Models
 */
final class Entry extends Model
{
    /**
     * @var string
     */
    protected $table = 'entries';

    /**
     * @var array
     */
    protected $fillable = [
        'feed_id',
        'title',
        'link',
        'description',
        'entry_published_at',
        'entry_updated_at'
    ];
}
