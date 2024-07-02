<?php

namespace EvolutionCMS\Middleware;

use Illuminate\Contracts\Session\Session;
use Symfony\Component\HttpFoundation\Response;

class StartSession extends \Illuminate\Session\Middleware\StartSession
{
    protected function addCookieToResponse(Response $response, Session $session)
    {

    }
}
