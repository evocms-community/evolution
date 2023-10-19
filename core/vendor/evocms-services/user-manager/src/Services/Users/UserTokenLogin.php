<?php namespace EvolutionCMS\UserManager\Services\Users;

use Carbon\Carbon;
use EvolutionCMS\Exceptions\ServiceActionException;
use EvolutionCMS\Exceptions\ServiceValidationException;
use EvolutionCMS\UserManager\Exceptions\TokenExpiredException;
use EvolutionCMS\UserManager\Interfaces\UserServiceInterface;
use \EvolutionCMS\Models\User;
use Illuminate\Support\Facades\Lang;

class UserTokenLogin extends UserLogin
{
    public function getValidationRules(): array
    {
        return [
            'token' => ['required'],
            'context'  => ['nullable', 'in:web,mgr'],
        ];
    }

    public function getValidationMessages(): array
    {
        return [
            'token.required' => Lang::get("global.required_field", ['field' => 'token']),
        ];
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Model
     * @throws ServiceActionException
     * @throws ServiceValidationException
     */
    public function process(): \Illuminate\Database\Eloquent\Model
    {
        if (!$this->checkRules()) {
            throw new ServiceActionException(\Lang::get('global.login_processor_unknown_user'));
        }

        $this->user = \EvolutionCMS\Models\User::query()
            ->where('access_token', $this->userData['token'])->first();
        if (is_null($this->user)) {
            throw new ServiceActionException(\Lang::get('global.login_processor_unknown_user'));
        }

        if(Carbon::now()->greaterThan($this->user->valid_to)) {
            throw new TokenExpiredException(\Lang::get('global.login_token_expired'));
        }

        $this->userSettings = $this->user->settings->pluck('setting_value', 'setting_name')->toArray();

        $this->validateAuth();
        $this->authProcess();
        $this->clearActiveUsers();

        if ($this->events) {
            // invoke OnManagerLogin event
            EvolutionCMS()->invokeEvent('OnUserLogin', array(
                'userid' => $this->user->getKey(),
                'username' => $this->user->username,
            ));
        }

        return $this->user;
    }
}
