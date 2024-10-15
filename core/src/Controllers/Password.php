<?php

namespace EvolutionCMS\Controllers;

use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;

class Password extends AbstractController implements PageControllerInterface
{
    protected string $view = 'page.password';

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return evo()->hasPermission('change_password');
    }

    public function getParameters(array $params = []): array
    {
        return [
            'actionButtons' => $this->parameterActionButtons(),
        ];
    }

    protected function parameterActionButtons(): array
    {
        return [
            'save' => 1,
            'cancel' => 1,
        ];
    }
}
