<?php

namespace App\Providers;

use App\Models\Image;
use App\Models\Message;
use App\Models\Post;
use App\Models\Room;
use App\Models\Todo;
use App\Policies\ImagePolicy;
use App\Policies\MessagePolicy;
use App\Policies\PostPolicy;
use App\Policies\RoomPolicy;
use App\Policies\TodoPolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Image::class => ImagePolicy::class,
        Message::class => MessagePolicy::class,
        Post::class => PostPolicy::class,
        Room::class => RoomPolicy::class,
        Todo::class => TodoPolicy::class,
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

        Gate::define('viewWebTinker', fn(User $user) => $user->hasRole('admin'));
    }
}
