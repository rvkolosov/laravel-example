<?php

namespace App\Http\Resources\Image;

use Illuminate\Http\Resources\Json\JsonResource;

class LoadImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'src' => $this->getSrc(),
            'alt' => $this->alt,
        ];
    }
}
