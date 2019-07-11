<?php

namespace App\Providers;

use Redis;
use Illuminate\Support\ServiceProvider;
use App\Models\Message;
use App\Observers\MessageObserver;


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

        Message::observe(MessageObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
