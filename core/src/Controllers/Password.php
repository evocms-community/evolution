<?php namespace EvolutionCMS\Controllers;

use EvolutionCMS\Facades\ManagerTheme;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;

class Password extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.password';

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return ManagerTheme::getCore()->hasPermission('change_password');
    }

    public function getParameters(array $params = []): array
    {
        return [
            'actionButtons' => $this->parameterActionButtons()
        ];
    }

    protected function parameterActionButtons()
    {
        return [
            'save' => 1,
            'cancel' => 1
        ];
    }
}
