<?php

namespace App\Providers;

use App\Providers\Auth\ChannelEloquentUserProvider;
use App\Providers\Auth\LiaisonEloquentUserProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        Auth::provider("channel-eloquent",function ($app,$config){
            $app['auth']->setDefaultDriver("channel");
            return new ChannelEloquentUserProvider($app['hash'],$config['model']);
        });
        Auth::provider("liaison-eloquent",function ($app,$config){
            $app['auth']->setDefaultDriver("liaison");
            return new LiaisonEloquentUserProvider($app['hash'],$config['model']);
        });
    }
}
