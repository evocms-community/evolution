<?php

namespace EvolutionCMS\Controllers\Users;

use EvolutionCMS\Controllers\AbstractController;
use EvolutionCMS\Exceptions\ServiceValidationException;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\UserManager\Facades\UserManager;

class ChangePassword extends AbstractController implements PageControllerInterface
{
    protected string $view = '';

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return evo()->hasPermission('save_password');
    }

    public function process(): bool
    {
        try {
            UserManager::changeManagerPassword($_POST);
        } catch (ServiceValidationException $exception) {
            foreach ($exception->getValidationErrors() as $errors) {
                if (is_array($errors)) {
                    foreach ($errors as $error) {
                        evo()->webAlertAndQuit($error, 'index.php?a=28');
                    }
                }
            }
        }

        header("Location: index.php?a=99");
        exit();
    }

}
