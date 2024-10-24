<?php

namespace EvolutionCMS\Controllers\Users;

use EvolutionCMS\Controllers\AbstractController;
use EvolutionCMS\Exceptions\ServiceActionException;
use EvolutionCMS\Exceptions\ServiceValidationException;
use EvolutionCMS\Facades\UrlProcessor;
use EvolutionCMS\Interfaces\ManagerTheme\PageControllerInterface;
use EvolutionCMS\Legacy\LogHandler;
use EvolutionCMS\Models\UserSetting;
use EvolutionCMS\UserManager\Facades\UserManager;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;

class LogInOut extends AbstractController implements PageControllerInterface
{
    protected string $view = '';

    /**
     * {@inheritdoc}
     */
    public function canView(): bool
    {
        return true;
    }

    public function process(): bool
    {
        switch ($this->getIndex()) {
            case 8:
                $this->logout();
                break;
            case 0:
                $this->login();
                break;
        }

        return true;
    }

    public function logout()
    {
        UserManager::logout();
        // show login screen
        header('Location: ' . MODX_MANAGER_URL);
        exit();
    }

    public function login()
    {
        if (!isset($_GET['hash'])) {
            $this->simpleLogin();
        } else {
            $this->loginFromHash();
        }
    }

    public function simpleLogin(): void
    {
        if (Config::get('global.use_captcha') == 1) {
            if (!isset ($_SESSION['veriword'])) {
                jsAlert(Lang::get('global.login_processor_captcha_config'));
                exit();
            } elseif ($_SESSION['veriword'] != $_POST['captcha_code']) {
                jsAlert(Lang::get('global.login_processor_bad_code'));
                exit();
            }
        }

        try {
            $user = UserManager::login($_POST);
        } catch (ServiceActionException $exception) {
            jsAlert($exception->getMessage());
            exit();
        } catch (ServiceValidationException $exception) {
            foreach ($exception->getValidationErrors() as $error) {
                jsAlert($error[0]);
                exit();
            }
        }

        $log = new LogHandler();
        $log->initAndWriteLog('Logged in', evo()->getLoginUserID('mgr'), $_SESSION['mgrShortname'], '58', '-', 'EVO');

        $id = 0;
// check if we should redirect user to a web page
        $setting = UserSetting::query()->where('user', $user->getKey())
            ->where('setting_name', 'manager_login_startup')->first();
        if (!is_null($setting)) {
            $id = (int) $setting->setting_value;
        }

        $ajax = (int) get_by_key($_POST, 'ajax', 0, 'is_scalar');

        if ($id > 0) {
            $header = 'Location: ' . UrlProcessor::makeUrl($id, '', '', 'full');
        } else {
            $header = 'Location: ' . MODX_MANAGER_URL;
        }

        if ($ajax === 1) {
            echo $header;
        } else {
            header($header);
        }

        exit();
    }

    public function loginFromHash()
    {
        try {
            UserManager::hashLogin($_GET);
        } catch (ServiceActionException $exception) {
            jsAlert($exception->getMessage());
            exit();
        }

        header('Location: ' . MODX_MANAGER_URL . '#?a=28');
        exit();
    }

}
