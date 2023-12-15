<?php

namespace EvolutionCMS\Middleware;

use Closure;
use EvolutionCMS\Facades\ManagerTheme;
use Illuminate\Http\Request;

class Manager
{
    /**
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed|string
     */
    public function handle(Request $request, Closure $next)
    {
        // Update last action in table active_users
        global $action;
        $action = ManagerTheme::getActionId();

        // accesscontrol.php checks to see if the user is logged in. If not, a log in form is shown
        if (0 !== $action && ManagerTheme::isAuthManager() === false) {
            return response(ManagerTheme::renderLoginPage());
        }

        // Ignore Logout and LogIn action
        if (8 !== $action && 0 !== $action && ManagerTheme::hasManagerAccess() === false) {
            return response(ManagerTheme::renderAccessPage());
        }

        return $next($request);
    }
}
