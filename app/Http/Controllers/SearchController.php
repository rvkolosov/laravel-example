<?php

namespace App\Http\Controllers;

use App\Http\Requests\Search\SearchTodoRequest;
use App\Models\Todo;
use App\Services\ElasticService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param SearchTodoRequest $request
     * @return int
     */
    public function todos(SearchTodoRequest $request)
    {
        return Todo::search('*')
            ->where('description', $request->input('query'))
            ->get();
        //return ElasticService::search($request->input('query'));
    }
}
