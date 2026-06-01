<?php namespace EvolutionCMS\Controllers\Users;

use EvolutionCMS\Controllers\AbstractController;
use EvolutionCMS\Exceptions\ServiceActionException;
use EvolutionCMS\Exceptions\ServiceValidationException;
use EvolutionCMS\Models;
use EvolutionCMS\Interfaces\ManagerTheme;

class ChangePassword extends AbstractController implements ManagerTheme\PageControllerInterface
{
    protected $view = '';

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return $this->managerTheme->getCore()->hasPermission('save_password');
    }

    public function process() : bool
    {
        try {
            \UserManager::changeManagerPassword($_POST);
        }catch (ServiceValidationException $exception){
            foreach ($exception->getValidationErrors() as $errors){
                if(is_array($errors)){
                    foreach ($errors as $error){
                        EvolutionCMS()->webAlertAndQuit($error, manager_route('change_password'));
                    }
                }
            }
        }

        header("Location:". manager_route('user_list'));
        exit();
    }
}
