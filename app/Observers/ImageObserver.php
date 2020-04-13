<?php

namespace App\Observers;

use App\Models\Image;

class ImageObserver
{
    /**
     * Handle the image "created" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function created(Image $image)
    {
        //
    }

    /**
     * Handle the image "updated" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function updated(Image $image)
    {
        //
    }

    /**
     * Handle the image "deleted" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function deleted(Image $image)
    {
        if ($image->post) {
            $image->post->update([
                'image_id' => null,
            ]);
        }
    }

    /**
     * Handle the image "restored" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function restored(Image $image)
    {
        //
    }

    /**
     * Handle the image "force deleted" event.
     *
     * @param  \App\Models\Image  $image
     * @return void
     */
    public function forceDeleted(Image $image)
    {
        //
    }
}
