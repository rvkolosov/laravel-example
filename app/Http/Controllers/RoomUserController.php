<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomUserController extends Controller
{
    /**
     * The constructor function
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function store(Room $room, User $user)
    {
        $this->authorize('create', $room);
        $this->authorize('create', $user);

        $room->users()->attach($user->id);

        return $room->load('users');
    }

    public function delete(Room $room, User $user)
    {
        $this->authorize('delete', $room);
        $this->authorize('delete', $user);

        $room->users()->detach($user->id);

        return $room->load('users');
    }
}
