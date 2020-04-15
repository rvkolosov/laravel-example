<?php

namespace App\Policies;

use App\Models\Room;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param $ability
     * @return bool
     */
    public function before(User $user, $ability)
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can view any rooms.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view-any-room');
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
        return $user->inRoom($room);
    }

    /**
     * Determine whether the user can create rooms.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create-room');
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
        return $user->hasPermissionTo('update-room')
            && $user->id === $room->user_id;
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
        return $user->hasPermissionTo('delete-room')
            && $user->id === $room->user_id;
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
        return $user->hasPermissionTo('restore-room');
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
