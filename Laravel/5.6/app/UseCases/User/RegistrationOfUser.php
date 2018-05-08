<?php
declare(strict_types=1);

namespace App\UseCases\User;

use App\Repositories\UserRepository;
use App\UseCases\UseCaseInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RegistrationOfUser
 * @package App\UseCases\User
 */
final class RegistrationOfUser implements UseCaseInterface
{
    /**
     * @param Model $user
     * @return bool
     */
    public function run(Model $user): bool
    {
        return (new UserRepository)->create($user);
    }
}
