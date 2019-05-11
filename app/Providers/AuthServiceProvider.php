<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\RolePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('roles.inboxpetugas', 'App\Policies\RolePolicy@inboxpetugas');
        Gate::define('roles.inboxortu', 'App\Policies\RolePolicy@inboxortu');
        Gate::define('roles.category', 'App\Policies\RolePolicy@category');
        Gate::define('roles.posyandu', 'App\Policies\RolePolicy@posyandu');
        Gate::define('roles.tag', 'App\Policies\RolePolicy@tag');
        Gate::define('roles.article', 'App\Policies\RolePolicy@article');
        Gate::define('roles.balita', 'App\Policies\RolePolicy@balita');
    }
}
