<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\SearchPostRequest;
use App\Http\Resources\Post\SearchPostsResource;
use App\Models\Post;

class SearchController extends Controller
{
    /**
     * @param SearchPostRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function posts(SearchPostRequest $request)
    {
        $posts = Post::search($request->input('query'))
            ->published()
            ->take($request->input('count', 10))
            ->get();

        return SearchPostsResource::collection($posts);
    }

}
