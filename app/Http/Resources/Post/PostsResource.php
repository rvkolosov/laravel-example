<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Image\LoadImageResource;
use App\Http\Resources\User\ShortUserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
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
            'slug' => $this->slug,
            'image_id' => $this->iamge_id,
            'user_id' => $this->user_id,
            'seo_keywords' => $this->key_words,
            'seo_description' => $this->seo_description,
            'title' => $this->title,
            'description' => $this->description,
            'text' => $this->text,
            'rating' => $this->rating,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => ShortUserResource::make($this->whenLoaded('user')),
            'image' => LoadImageResource::make($this->whenLoaded('image')),
        ];
    }
}
