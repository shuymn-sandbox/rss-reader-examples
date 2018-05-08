<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\UseCases\User\RegistrationOfUser;

/**
 * Class UserService
 * @package App\Services
 */
final class UserService
{
    /**
     * @var RegistrationOfUser
     */
    private $registrationOfUser;

    /**
     * UserService constructor.
     * @param RegistrationOfUser $registrationOfUser
     */
    public function __construct(
        RegistrationOfUser $registrationOfUser
    ) {
        $this->registrationOfUser = $registrationOfUser;
    }

    /**
     * @param string $username
     * @param string $nickname
     * @param string $email
     * @param string $password
     * @return User
     */
    public function register(string $username, string $nickname, string $email, string $password): User
    {
        $newUser = new User;
        $newUser->setUserName($username);
        $newUser->setUserName($nickname);
        $newUser->setEMail($email);
        $newUser->setPassword($password);

        if (!$this->registrationOfUser->run($newUser)) {
            throw new \RuntimeException('User registration was failed');
        }

        return $newUser;
    }
}
