<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App\Models
 */
final class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = [
        'username',
        'nickname',
        'email',
        'password',
        'profile_image',
        'description',
        'url'
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute('nickname');
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    /**
     * @param string $username
     */
    public function setUserName(string $username): void
    {
        $this->setAttribute('username', $username);
    }

    /**
     * @param string $nickname
     */
    public function setNickName(string $nickname): void
    {
        $this->setAttribute('nickname', $nickname);
    }

    /**
     * @param string $email
     */
    public function setEMail(string $email): void
    {
        $this->setAttribute('email', $email);
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->setAttribute('password', $password);
    }
}
