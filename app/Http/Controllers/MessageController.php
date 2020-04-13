<?php

namespace App\Http\Controllers;

use App\Events\Room\NewRoomMessage;
use App\Http\Requests\Message\StoreMessageRequest;
use App\Http\Requests\Message\UpdateMessageRequest;
use App\Http\Resources\Message\MessageResource;
use App\Http\Resources\Message\MessagesResource;
use App\Models\Message;
use Illuminate\Contracts\Auth\Authenticatable;
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
            ->paginate($request->input('count', 15));

        return MessagesResource::collection($messages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMessageRequest $request
     * @param Authenticatable $user
     * @return MessageResource
     */
    public function store(StoreMessageRequest $request, Authenticatable $user)
    {
        $message = Message::create($request->validated());

        broadcast(new NewRoomMessage($message, $user))->toOthers();

        return MessageResource::make($message);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Message $message
     * @return MessageResource
     */
    public function show(Message $message)
    {
        return MessageResource::make($message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMessageRequest $request
     * @param \App\Models\Message $message
     * @return MessageResource
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        $message->update($request->validated());

        return MessageResource::make($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Message $message
     * @return MessageResource
     * @throws \Exception
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return MessageResource::make($message);
    }
}
