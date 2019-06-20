<?php

namespace App\Providers;

use App\Observers\UserObserver;
use App\User;
use Redis;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Redis::enableEvents();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        User::observe(UserObserver::class);
    }
}
