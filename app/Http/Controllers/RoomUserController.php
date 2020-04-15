<?php

namespace App\Http\Controllers;

use App\Http\Resources\Room\RoomResource;
use App\Models\Room;
use App\User;
use Illuminate\Http\Request;

class RoomUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @param Room $room
     * @param User $user
     * @return RoomResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Room $room, User $user)
    {
        $this->authorize('update', $room);

        $room->users()->attach($user);

        return RoomResource::make($room);
    }

    /**
     * @param Room $room
     * @param User $user
     * @return RoomResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function delete(Room $room, User $user)
    {
        $this->authorize('update', $room);

        $room->users()->detach($user);

        return RoomResource::make($room);
    }
}
