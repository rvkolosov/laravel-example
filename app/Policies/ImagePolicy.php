<?php

namespace App\Policies;

use App\Models\Image;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
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
     * Determine whether the user can view any images.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view-any-image');
    }

    /**
     * Determine whether the user can view the image.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Image  $image
     * @return mixed
     */
    public function view(User $user, Image $image)
    {
        return $user->hasPermissionTo('view-image');
    }

    /**
     * Determine whether the user can create images.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create-image');
    }

    /**
     * Determine whether the user can update the image.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Image  $image
     * @return mixed
     */
    public function update(User $user, Image $image)
    {
        return $user->hasPermissionTo('update-image')
            && (optional($image->post)->user_id === $user->id
                || is_null($image->post));
    }

    /**
     * Determine whether the user can delete the image.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Image  $image
     * @return mixed
     */
    public function delete(User $user, Image $image)
    {
        return $user->hasPermissionTo('delete-image')
            && (optional($image->post)->user_id === $user->id
                || is_null($image->post));
    }

    /**
     * Determine whether the user can restore the image.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Image  $image
     * @return mixed
     */
    public function restore(User $user, Image $image)
    {
        return $user->hasPermissionTo('restore-image');
    }

    /**
     * Determine whether the user can permanently delete the image.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Image  $image
     * @return mixed
     */
    public function forceDelete(User $user, Image $image)
    {
        return false;
    }
}
