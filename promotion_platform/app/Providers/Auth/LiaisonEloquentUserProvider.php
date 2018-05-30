<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/20 0020
 * Time: 18:36
 */

namespace App\Providers\Auth;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class LiaisonEloquentUserProvider extends EloquentUserProvider
{
    /**
     * 校验密码
     * @param Authenticatable $user
     * @param array $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $plain = $credentials['password'];
        $authPassword = $user->getAuthPassword();
        return md5(md5($plain)) == $authPassword;
    }

    /**
     * 查询数据
     * @param array $credentials
     * @return Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        if (is_array($credentials) && array_key_exists("mobile", $credentials)) {
            $credentials['promoter_phone'] = $credentials['mobile'];
            unset($credentials['mobile']);
        }
        return parent::retrieveByCredentials($credentials);
    }
}