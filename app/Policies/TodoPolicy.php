<?php

namespace App\Policies;

use App\User;
use App\Models\Todo;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoPolicy
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
     * Determine whether the user can view list of todos.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the todo.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Todo  $todo
     * @return mixed
     */
    public function view(User $user, Todo $todo)
    {
        return true;
    }

    /**
     * Determine whether the user can create todos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('todo-create');
    }

    /**
     * Determine whether the user can update the todo.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Todo  $todo
     * @return mixed
     */
    public function update(User $user, Todo $todo)
    {
        return $user->hasPermission('todo-update')
            && $user->id == $todo->id;
    }

    /**
     * Determine whether the user can delete the todo.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Todo  $todo
     * @return mixed
     */
    public function delete(User $user, Todo $todo)
    {
        return $user->hasPermission('todo-delete')
            && $user->id == $todo->id;
    }

    /**
     * Determine whether the user can restore the todo.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Todo  $todo
     * @return mixed
     */
    public function restore(User $user, Todo $todo)
    {
        return $user->hasPermission('todo-restore')
            && $user->id == $todo->id;
    }

    /**
     * Determine whether the user can permanently delete the todo.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Todo  $todo
     * @return mixed
     */
    public function forceDelete(User $user, Todo $todo)
    {
        return false;
    }
}
