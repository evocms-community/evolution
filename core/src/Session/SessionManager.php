<?php

namespace EvolutionCMS\Session;

class SessionManager extends \Illuminate\Session\SessionManager
{
    protected function buildSession($handler)
    {
        return new Store(
            SESSION_COOKIE_NAME,
            $handler,
            null,
            $this->config->get('session.serialization', 'php')
        );
    }
}
