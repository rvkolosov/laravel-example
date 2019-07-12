<?php

namespace App\Policies;

use App\User;
use App\Models\Room;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomPolicy
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
     * Determine whether the user can view any rooms.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('room-list');
    }

    /**
     * Determine whether the user can view the room.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Room  $room
     * @return mixed
     */
    public function view(User $user, Room $room)
    {
        return $user->hasPermission('room-view');
    }

    /**
     * Determine whether the user can create rooms.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('room-create');
    }

    /**
     * Determine whether the user can update the room.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Room  $room
     * @return mixed
     */
    public function update(User $user, Room $room)
    {
        return $user->hasPermission('room-update')
            && $room->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the room.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Room  $room
     * @return mixed
     */
    public function delete(User $user, Room $room)
    {
        return $user->hasPermission('room-delete')
            && $room->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the room.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Room  $room
     * @return mixed
     */
    public function restore(User $user, Room $room)
    {
        return $user->hasPermission('room-restore')
            && $room->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the room.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Room  $room
     * @return mixed
     */
    public function forceDelete(User $user, Room $room)
    {
        return false;
    }
}
