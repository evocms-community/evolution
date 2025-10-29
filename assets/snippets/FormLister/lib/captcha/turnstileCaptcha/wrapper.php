use FormLister\CaptchaInterface;
use FormLister\Core;

/**
 * Class TurnstileWrapper
 */
class TurnstileWrapper implements CaptchaInterface
{
    /**
     * @var array $cfg
     * id, secretKey, siteKey
     */
    public $cfg = null;
    protected $modx = null;

    /**
     * modxCaptchaWrapper constructor.
     * @param $modx
     * @param $cfg
     */
    public function __construct(\DocumentParser $modx, $cfg = array())
    {
        $this->cfg = $cfg;
        $this->modx = $modx;
    }

    /**
     * Устанавливает значение капчи
     * @return mixed
     */
    public function init()
    {
        return;
    }

    /**
     * Плейсхолдер капчи для вывода в шаблон
     * Может быть ссылкой на коннектор (чтобы можно было обновлять c помощью js), может быть сразу картинкой в base64
     * @return string
     */
    public function getPlaceholder()
    {
        $siteKey = \APIhelpers::getkey($this->cfg, 'siteKey');
        $out = '';
        if (!empty($siteKey)) {
           $out = "<div {$id} class=\"cf-turnstile\" data-sitekey=\"{$siteKey}\"></div>";
        }

        return $out;
    }

    /**
     * @param \FormLister\Core $FormLister
     * @param $value
     * @param \FormLister\CaptchaInterface $captcha
     * @return bool|string
     */
    public static function validate(Core $FormLister, $value, CaptchaInterface $captcha)
    {

    $secretKey = \APIhelpers::getkey($captcha->cfg, 'secretKey');
    $url = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
	
    $data = [
        'secret' => $secretKey,
        'response' => $value
    ];

    $remote_ip = null;
    if (isset($_SERVER)) {
       $FormLister->log('getting remote IP from _SERVER');
       if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                $remote_ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
            } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $remote_ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $remote_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $remote_ip = $_SERVER['REMOTE_ADDR'];
            }
    } else {
            $FormLister->log('getting remote IP from APIhelpers');
       $remoteip = \APIhelpers::getUserIP();
    }
    if ($remoteip) {
            $data['remoteip'] = $remoteip;
    }
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_USERAGENT,
                "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");

    curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
    ]);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    $response = [
            'result' => curl_exec($curl),
            'error' => curl_error($curl),
            'code' => curl_getinfo($curl, CURLINFO_HTTP_CODE)
        ];
    curl_close($curl);
    if (!empty($response['result'])) {
         $response['result'] = json_decode($response['result']);
    }

    if ($response === FALSE) {
        return ['success' => false, 'error-codes' => ['internal-error']];
    }

    $response = json_decode($response, true);
    $out = $response['success'];

    if (!$out) {
         $out = \APIhelpers::getkey($captcha->cfg, 'errorCodeFailed', 'Validation failed');
    }
    $FormLister->log('turnstile validation result: '.$out);

    return $out;

}
