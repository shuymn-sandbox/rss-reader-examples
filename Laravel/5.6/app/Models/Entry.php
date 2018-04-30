<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table = 'entries';

    protected $fillable = [
        'feed_id',
        'title',
        'link',
        'description',
        'entry_published_at',
        'entry_updated_at'
    ];
}
