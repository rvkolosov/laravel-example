<?php

namespace App\Observers;

use App\Models\Todo;

class TodoObserver
{
    /**
     * Handle the todo "creating" event.
     *
     * @param Todo $todo
     * @return void
     */
    public function creating(Todo $todo)
    {
        $todo->user_id = \Auth::user()->id;
    }

    /**
     * Handle the todo "created" event.
     *
     * @param  \App\Models\Todo  $todo
     * @return void
     */
    public function created(Todo $todo)
    {
        //
    }

    /**
     * Handle the todo "updated" event.
     *
     * @param  \App\Models\Todo  $todo
     * @return void
     */
    public function updated(Todo $todo)
    {
        //
    }

    /**
     * Handle the todo "deleted" event.
     *
     * @param  \App\Models\Todo  $todo
     * @return void
     */
    public function deleted(Todo $todo)
    {
        //
    }

    /**
     * Handle the todo "restored" event.
     *
     * @param  \App\Models\Todo  $todo
     * @return void
     */
    public function restored(Todo $todo)
    {
        //
    }

    /**
     * Handle the todo "force deleted" event.
     *
     * @param  \App\Models\Todo  $todo
     * @return void
     */
    public function forceDeleted(Todo $todo)
    {
        //
    }
}
