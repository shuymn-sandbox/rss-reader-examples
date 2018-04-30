<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected $table = 'feeds';

    protected $fillable = [
        'url',
        'title',
        'link',
        'description'
    ];
}
