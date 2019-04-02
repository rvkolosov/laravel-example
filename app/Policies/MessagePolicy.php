<?php

namespace App\Policies;

use App\User;
use App\Models\Message;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * @param $user
     * @param $ability
     * @return bool|null
     */
    public function before($user, $ability)
    {
        if ($user->isRole('admin')) return true;
    }

    /**
     * Determine whether the user can view list of roles.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function list(User $user)
    {
        return $user->hasPermission('message-list');
    }

    /**
     * Determine whether the user can view the message.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function view(User $user, Message $message)
    {
        return $user->hasPermission('message-view');
    }

    /**
     * Determine whether the user can create messages.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('message-create');
    }

    /**
     * Determine whether the user can update the message.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function update(User $user, Message $message)
    {
        return $user->hasPermission('message-update');
    }

    /**
     * Determine whether the user can delete the message.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function delete(User $user, Message $message)
    {
        return $user->hasPermission('message-delete');
    }

    /**
     * Determine whether the user can restore the message.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function restore(User $user, Message $message)
    {
        return $user->hasPermission('message-restore');
    }

    /**
     * Determine whether the user can permanently delete the message.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Message  $message
     * @return mixed
     */
    public function forceDelete(User $user, Message $message)
    {
        return false;
    }
}
