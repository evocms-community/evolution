<?php

namespace EvolutionCMS\Session;

class SessionManager extends \Illuminate\Session\SessionManager
{
    protected function buildSession($handler)
    {
        return new Store(
            $this->config->get('session.cookie'),
            $handler,
            null,
            $this->config->get('session.serialization', 'php')
        );
    }
}
