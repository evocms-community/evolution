<?php

namespace EvolutionCMS\Facades;

use EvolutionCMS\Interfaces\CoreInterface;
use Illuminate\Support\Facades\Facade;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method static string getTheme()
 * @method static string getLang()
 * @method static string getLangName()
 * @method static string getTextDir($notEmpty = null)
 * @method static void setTextDir($textDir = 'rtl')
 * @method static mixed getLexicon($key = null, $default = '')
 * @method static string getCharset()
 * @method static void setCharset($charset)
 * @method static string getViewName($name)
 * @method static void loadStyle()
 * @method static string getThemeDir($full = true)
 * @method static string getThemeUrl()
 * @method static mixed getStyle($key = null)
 * @method static view($name, array $params = [])
 * @method static array getViewAttributes(array $params = [])
 * @method static string getFileProcessor($filepath, $theme = null)
 * @method static null|mixed findController($action)
 * @method static Request setRequest()
 * @method static handleRoute()
 * @method static handle($action, array $data = [])
 * @method static getItemId()
 * @method static getActionId()
 * @method static isAuthManager()
 * @method static hasManagerAccess()
 * @method static getManagerStartupPageId()
 * @method static string renderAccessPage()
 * @method static getTemplate($name, $config = null)
 * @method static string makeTemplate($name, $config = null, array $placeholders = [], $clean = true)
 * @method static array getTemplatePlaceholders()
 * @method static renderLoginPage()
 * @method static saveAction($action)
 * @method static loadValuesFromSession($data)
 * @method static CoreInterface getCore()
 * @method static void alertAndQuit(string $message, $lexicon = true)
 * @method static bool isLoadDatePicker()
 * @method static array getCssFiles()
 * @method static string css()
 * @method static string getMainFrameHeaderHTMLBlock()
 * @method static string getThemeStyle()
 * @method static string repairPassword($plh)
 * @method static string sendRepairMail($email, $hash, $mode)
 *
 * @see \EvolutionCMS\ManagerTheme
 */
class ManagerTheme extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'ManagerTheme';
    }
}
