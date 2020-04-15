<?php

namespace App\Http\Controllers;

use App\Http\Requests\Room\StoreRoomRequest;
use App\Http\Requests\Room\UpdateRoomRequest;
use App\Http\Resources\Room\RoomResource;
use App\Http\Resources\Room\RoomsResource;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->authorizeResource(Room::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $rooms = Room::filtered()
            ->paginate($request->input('count', 15));

        return RoomsResource::collection($rooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoomRequest $request
     * @return RoomResource
     */
    public function store(StoreRoomRequest $request)
    {
        $room = Room::create($request->validated());

        return RoomResource::make($room);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return RoomResource
     */
    public function show(Room $room)
    {
        return RoomResource::make($room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoomRequest $request
     * @param \App\Models\Room $room
     * @return RoomResource
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $room->update($request->validated());

        return RoomResource::make($room);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Room $room
     * @return RoomResource
     * @throws \Exception
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return RoomResource::make($room);
    }
}
