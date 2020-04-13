<?php

namespace App\Http\Controllers;

use App\Http\Requests\Todo\StoreTodoRequest;
use App\Http\Requests\Todo\UpdateTodoRequest;
use App\Http\Resources\Todo\TodoResource;
use App\Http\Resources\Todo\TodosResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->authorizeResource(Todo::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $todos = Todo::filtered()
            ->paginate($request->input('count', 15));

        return TodosResource::collection($todos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTodoRequest $request
     * @return TodoResource
     */
    public function store(StoreTodoRequest $request)
    {
        $todo = Todo::create($request->validated());

        return TodoResource::make($todo);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Todo $todo
     * @return TodoResource
     */
    public function show(Todo $todo)
    {
        return TodoResource::make($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTodoRequest $request
     * @param \App\Models\Todo $todo
     * @return TodoResource
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $todo->update($request->validated());

        return TodoResource::make($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Todo $todo
     * @return TodoResource
     * @throws \Exception
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return TodoResource::make($todo);
    }
}
