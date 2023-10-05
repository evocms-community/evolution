<?php namespace EvolutionCMS\Middleware;

use Closure;

class VerifyCsrfToken
{
    public function handle($request, Closure $next)
    {
        if(in_array($request->method(), ['HEAD', 'GET', 'OPTIONS']) || (isset($_SESSION['_token']) && $_SESSION['_token'] == $request->input('_token'))) {
            return $next($request);
        } else {
            return \Response::json(['error' => 'CSRF token mismatch'], '403');
        }
    }
}
