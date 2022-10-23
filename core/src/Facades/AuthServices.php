<?php

namespace EvolutionCMS\Facades;

use EvolutionCMS\Models\User;
use Illuminate\Support\Facades\Facade;

/**
 *
 * @method static bool check()
 * @method static bool hasUser()
 * @method static bool guest()
 * @method static int id()
 * @method static User user()
 * @method static void logout()
 * @method static bool viaRemember()
 * @method static bool attempt(array $checked = [])
 * @method static User login($user, bool $remember = false)
 * @method static User loginUsingId($userId, bool $remember = false)
 *
 * @see \EvolutionCMS\Services\AuthServices
 */
class AuthServices  extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'AuthServices';
    }
}
