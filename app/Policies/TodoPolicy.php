<?php

namespace App\Policies;

use App\Models\Todo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoPolicy
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
     * Determine whether the user can view any todos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
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
        //
    }

    /**
     * Determine whether the user can create todos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
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
        //
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
        //
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
        //
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
        //
    }
}
