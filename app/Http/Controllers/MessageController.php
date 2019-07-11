<?php

namespace App\Http\Controllers;

use App\Events\Message\NewMessage;
use App\Events\Room\NewRoomMessage;
use App\Http\Requests\Message\StoreMessageRequest;
use App\Http\Requests\Message\UpdateMessageRequest;
use App\Http\Resources\Message\MessageResource;
use App\Http\Resources\Message\MessagesResource;
use App\Models\Message;
use Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->authorizeResource(Message::class);
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $messages = Message::filtered()
            ->withRelations()
            ->paginate($request->input('count') ?? null);

        return MessagesResource::collection($messages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMessageRequest $request
     * @return MessageResource
     */
    public function store(StoreMessageRequest $request)
    {
        if (!Auth::user()->inRoom($request->input('room_id'))) abort(403);

        $message = Message::create($request->validated());

        broadcast(new NewRoomMessage($message, Auth::user()->name))->toOthers();

        return new MessageResource($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message $message
     * @return MessageResource
     */
    public function show(Message $message)
    {
        return new MessageResource($message->loadRelations());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMessageRequest $request
     * @param  \App\Models\Message $message
     * @return MessageResource
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        $message->update($request->validated());

        return new MessageResource($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message $message
     * @return MessageResource
     * @throws \Exception
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return new MessageResource($message);
    }
}
