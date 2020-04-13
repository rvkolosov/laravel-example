<?php

namespace App\Http\Controllers;

use App\Http\Requests\Image\StoreImageRequest;
use App\Http\Requests\Image\UpdateImageRequest;
use App\Http\Resources\Image\ImageResource;
use App\Http\Resources\Image\ImagesResource;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->authorizeResource(Image::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $images = Image::filtered()
            ->paginate($request->input('count', 15));

        return ImagesResource::collection($images);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreImageRequest $request
     * @return ImageResource
     */
    public function store(StoreImageRequest $request)
    {
        $image = Image::create($request->validated());

        return ImageResource::make($image);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Image $image
     * @return ImageResource
     */
    public function show(Image $image)
    {
        return ImageResource::make($image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateImageRequest $request
     * @param \App\Models\Image $image
     * @return ImageResource
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        $image->update($request->validated());

        return ImageResource::make($image);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Image $image
     * @return ImageResource
     * @throws \Exception
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return ImageResource::make($image);
    }
}
