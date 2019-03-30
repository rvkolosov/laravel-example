<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Todo;
use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use App\Policies\TodoPolicy;
use App\Policies\UserPolicy;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Role::class => RolePolicy::class,
        Todo::class => TodoPolicy::class,
        Permission::class => PermissionPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
    }
}
