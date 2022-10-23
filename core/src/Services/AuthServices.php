<?php

namespace EvolutionCMS\Services;

use EvolutionCMS\Models\User;

class AuthServices
{
    /**
     * @var User|null
     */
    public ?User $user = null;

    public function __construct()
    {
        $this->user = User::query()
            ->find(EvolutionCMS()->getLoginUserID());

        if (!is_null($this->user)) {
            $this->user->email = $this->user->attributes->email;
            $this->user->phone = $this->user->attributes->phone;
            $this->user->name = $this->user->attributes->first_name;
            $this->user->full_name = $this->user->attributes->full_name;
        }
    }

    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public function check(): bool
    {
        return !is_null($this->user);
    }

    /**
     * Determine if the guard has a user instance.
     *
     * @return bool
     */
    public function hasUser(): bool
    {
        return !is_null($this->user);
    }

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest(): bool
    {
        return !$this->check();
    }

    /**
     * Determine if the current user is a guest.
     *
     * @return int|null
     */
    public function id(): ?int
    {
        return $this->user ? $this->user->getKey() : null;
    }

    /**
     * Get User
     *
     * @return User
     */
    public function user(): User
    {
        return $this->user;
    }

    /**
     * Logout User
     *
     * @return void
     */
    public function logout()
    {
        UserManager::logout();
    }

    /**
     * If you are "remembering" users
     *
     * @return bool
     */
    public function viaRemember(): bool
    {
        return isset($_COOKIE['modx_remember_manager']);
    }

    /**
     * @param array $checked
     *
     * @return bool
     */
    public function attempt(array $checked = []): bool
    {
        foreach ($checked as $key => $value) {
            if (isset($this->user->{$key})) {
                if ($this->user->{$key} == $value) {
                    unset($checked[$key]);
                }
            }
            if (isset($this->user->attributes->{$key})) {
                if ($this->user->attributes->{$key} == $value) {
                    unset($checked[$key]);
                }
            }

            if ($key == 'password') {
                $matchPassword = false;

                // check user password - local authentication
                $hashType = EvolutionCMS()->getManagerApi()->getHashType($this->user->password);

                if ($hashType == 'phpass') {
                    $matchPassword = login(
                        $this->user->username,
                        $value,
                        $this->user->password
                    );
                } elseif ($hashType == 'md5') {
                    $matchPassword = loginMD5(
                        $this->user->getKey(),
                        $value,
                        $this->user->password,
                        $this->user->username
                    );
                } elseif ($hashType == 'v1') {
                    $matchPassword = loginV1(
                        $this->user->getKey(),
                        $value,
                        $this->user->password,
                        $this->user->username
                    );
                }

                if ($matchPassword) {
                    unset($checked[$key]);
                }
            }
        }

        return !count($checked) > 0;
    }

    /**
     * @param $user
     * @param bool $remember
     *
     * @return User
     */
    public function login($user, bool $remember = false): User
    {
        return $this->loginUsingId($user->getKey(), $remember);
    }

    /**
     * @param $userId
     * @param bool $remember
     *
     * @return User
     */
    public function loginUsingId($userId, bool $remember = false): User
    {
        return UserManager::loginById([
            'id' => $userId,
            'rememberme' => $remember
        ]);
    }

}
