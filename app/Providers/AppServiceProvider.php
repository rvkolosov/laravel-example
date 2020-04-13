<?php

namespace App\Providers;

use App\Models\Message;
use App\Models\Post;
use App\Observers\MessageObserver;
use App\Observers\PostObserver;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Activity::saving(fn($activity) => $activity->properties->put('ip', request()->ip()));

        \Spatie\NovaTranslatable\Translatable::defaultLocales(['en', 'ru']);

        Message::observe(MessageObserver::class);
        Post::observe(PostObserver::class);
    }
}
