<?php

namespace EvolutionCMS\Controllers\Users;

use EvolutionCMS\Controllers\AbstractController;
use EvolutionCMS\Exceptions\ServiceValidationException;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Models\UserAttribute;
use EvolutionCMS\UserManager\Facades\UserManager;
use Illuminate\Support\Facades\Lang;

class DeleteUser extends AbstractController implements PageControllerInterface
{
    protected string $view = '';

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return evo()->hasPermission('delete_user');
    }

    public function process(): bool
    {
        if ($_GET['id'] == evo()->getLoginUserID()) {
            evo()->webAlertAndQuit(Lang::get('global.delete_yourself'));
        }

        /** @var UserAttribute $user */
        $user = UserAttribute::query()->where('internalKey', $_GET['id'])->first();

        if ($user->role == 1) {
            $otherAdmin = UserAttribute::query()->where('role', 1)->where('internalKey', '!=', $_GET['id'])->count();
            if ($otherAdmin == 0) {
                evo()->webAlertAndQuit(Lang::get('global.delete_last_admin'));
            }
        }
        try {
            UserManager::delete($_GET);
        } catch (ServiceValidationException $exception) {
            foreach ($exception->getValidationErrors() as $errors) {
                if (is_array($errors)) {
                    foreach ($errors as $error) {
                        evo()->webAlertAndQuit($error);
                    }
                }
            }
        }
        header('Location: index.php?a=99');
        exit();
    }

}
