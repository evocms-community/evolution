<?php namespace EvolutionCMS\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class VerifyCsrfToken
{
    /**
     * @param Request $request
     * @param Closure $next
     *
     * @return JsonResponse|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('_token') && isset($_SESSION['_token']) && $_SESSION['_token'] !== $request->input('_token')) {
            return Response::json(['error' => 'CSRF token mismatch'], '403');

        }
        return $next($request);
    }
}
