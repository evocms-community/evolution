<?php

namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use Illuminate\Http\Response;
use EvolutionCMS\Tracy\Debugger;
use Illuminate\Support\Facades\Response as ResponseFacade;

class Actions extends AbstractController implements PageControllerInterface
{
    public function handleAction()
    {
        // Update last action in table active_users
        $action = ManagerTheme::getActionId();

        $output = '';

        if ($action === null) {
            $_style = ManagerTheme::getStyle();
            // first we check to see if this is a frameset request
            Debugger::$showBar = false;
            // this looks to be a top-level frameset request, so let's serve up a frameset
            $output = ManagerTheme::handle(1, ['frame' => 1]);
        } else {
            $output = ManagerTheme::handle($action);
        }

        if ($output instanceof Response) {
            return $output;
        }

        $isRedirect = array_reduce(headers_list(), function ($result, $header) {
            return strpos($header, 'Location') === 0;
        }, 0);

        return ResponseFacade::make($output, $isRedirect ? 302 : 200);
    }

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return true;
    }

    public function process(): bool
    {
        return true;
    }
}
