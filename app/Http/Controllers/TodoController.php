<?php

namespace App\Http\Controllers;

use App\Http\Requests\Todo\StoreTodoRequest;
use App\Http\Requests\Todo\UpdateTodoRequest;
use App\Http\Resources\Todo\TodoResource;
use App\Http\Resources\Todo\TodosResource;
use App\Models\Todo;
use App\User;
use Auth;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth:api')
            ->except([
                'index',
                'show',
            ]);
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
            ->withRelations()
            ->paginate($request->input('count') ?? null);

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
        $todo = Todo::create($request->all());

        return new TodoResource($todo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo $todo
     * @return TodoResource
     */
    public function show(Todo $todo)
    {
        return new TodoResource($todo->loadRelations());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTodoRequest $request
     * @param  \App\Models\Todo $todo
     * @return TodoResource
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $todo->update($request->all());

        return new TodoResource($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo $todo
     * @return TodoResource
     * @throws \Exception
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return new TodoResource($todo);
    }
}
