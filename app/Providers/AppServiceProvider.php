<?php

namespace App\Providers;

use App\Models\Image;
use App\Models\Message;
use App\Models\Post;
use App\Models\Room;
use App\Models\Todo;
use App\Observers\ImageObserver;
use App\Observers\MessageObserver;
use App\Observers\PostObserver;
use App\Observers\RoomObserver;
use App\Observers\TodoObserver;
use App\User;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        Image::observe(ImageObserver::class);
        Room::observe(RoomObserver::class);
        Todo::observe(TodoObserver::class);

        Relation::morphMap([
            'users' => User::class,
            'messages' => Message::class,
            'posts' => Post::class,
            'images' => Image::class,
            'rooms' => Room::class,
            'todos' => Todo::class,
        ]);
    }
}
