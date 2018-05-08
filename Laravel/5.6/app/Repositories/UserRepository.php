<?php
declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserRepository
 * @package App\Repositories
 */
final class UserRepository
{
    /**
     * @param Model $user
     * @return bool
     */
    public function create(Model $user): bool
    {
        if (!$user instanceof \App\Models\User) {
            throw new \RuntimeException('Not match User');
        }

        return $user->save();
    }
}
