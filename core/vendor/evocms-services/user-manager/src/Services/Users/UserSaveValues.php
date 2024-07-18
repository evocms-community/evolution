<?php namespace EvolutionCMS\UserManager\Services\Users;

use EvolutionCMS\Exceptions\ServiceActionException;
use EvolutionCMS\Exceptions\ServiceValidationException;
use EvolutionCMS\Models\SiteTmplvarTemplate;
use EvolutionCMS\Models\UserAttribute;
use EvolutionCMS\Models\UserRoleVar;
use EvolutionCMS\UserManager\Interfaces\UserServiceInterface;
use EvolutionCMS\Models\User;
use EvolutionCMS\Models\UserValue;
use EvolutionCMS\Models\SiteTmplvar;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;

class UserSaveValues implements UserServiceInterface
{
    use ExcludeStandardFieldsTrait;

    /**
     * @var \string[][]
     */
    public $validate;

    /**
     * @var array
     */
    public $messages;

    /**
     * @var array
     */
    public $userData;

    /**
     * @var bool
     */
    public $events;

    /**
     * @var bool
     */
    public $cache;

    /**
     * @var array $validateErrors
     */
    public $validateErrors;

    /**
     * UserRegistration constructor.
     * @param array $userData
     * @param bool $events
     * @param bool $cache
     */
    public function __construct(array $userData, bool $events = true, bool $cache = true)
    {
        $this->userData = $userData;
        $this->events = $events;
        $this->cache = $cache;
        $this->validate = $this->getValidationRules();
        $this->messages = $this->getValidationMessages();
    }

    /**
     * @return \string[][]
     */
    public function getValidationRules(): array
    {
        return ['id' => ['required']];
    }

    /**
     * @return array
     */
    public function getValidationMessages(): array
    {
        return ['id.required' => Lang::get("global.required_field", ['field' => 'username'])];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Model
     * @throws ServiceActionException
     * @throws ServiceValidationException
     */
    public function process(): bool
    {
        if (!$this->checkRules()) {
            throw new ServiceActionException(\Lang::get('global.error_no_privileges'));
        }


        if (!$this->validate()) {
            $exception = new ServiceValidationException();
            $exception->setValidationErrors($this->validateErrors);
            throw $exception;
        }

        $id = $this->userData['id'];
        unset($this->userData['id']);
        $role = UserAttribute::select('role')->where('internalKey', $id)->value('role');

        $values = $this->excludeStandardFields($this->userData);

        $tmplvars = Cache::store('array')->rememberForever('roletmplvars' . $role,
            function () use ($role) {
                return Cache::rememberForever('roletmplvars' . $role, function () use ($role) {
                    return UserRoleVar::query()->select('site_tmplvars.*')
                        ->where('roleid', $role)
                        ->join('site_tmplvars', 'site_tmplvars.id', '=', 'user_role_vars.tmplvarid')->get();
                });
            });
        $tvs = [];

        foreach ($tmplvars as $tmplvar) {
            if(!isset($this->userData[$tmplvar->name])) continue;
            if (!is_null($this->userData[$tmplvar->name]) && $this->userData[$tmplvar->name] != $tmplvar->default_text) {
                $tvs['save'][] = ['id' => $tmplvar->id, 'value' => $this->userData[$tmplvar->name]];
            } else {
                $tvs['delete'][] = $tmplvar->id;
            }
        }

        if(isset($tvs['save'])) {
            foreach ($tvs['save'] as $value) {
                UserValue::updateOrCreate([
                    'userid' => $id, 'tmplvarid' => $value['id']
                ], ['value' => $value['value']]);
            }
        }
        if(isset($tvs['delete'])) {
            UserValue::query()
                ->whereIn('tmplvarid', $tvs['delete'])
                ->where('userid', $id)
                ->delete();
        }

        if ($this->cache) {
            EvolutionCMS()->clearCache('full');
        }

        return true;
    }

    /**
     * @return bool
     */
    public function checkRules(): bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function validate(): bool
    {
        return true;
    }

}
