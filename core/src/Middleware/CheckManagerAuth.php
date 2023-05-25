<?php namespace EvolutionCMS\Middleware;

use Closure;
use EvolutionCMS\Facades\ManagerTheme;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CheckManagerAuth
{
    /**
     * @param Request $request
     * @param Closure $next
     *
     * @return JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (ManagerTheme::hasManagerAccess() === false) {
            return Response::json(['error' => 'No Manager Access'], '403');

        }
        return $next($request);
    }
}
