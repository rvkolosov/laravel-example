<?php

namespace App\Http\Controllers;

use App\Http\Requests\Search\SearchTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param SearchTodoRequest $request
     * @return array
     */
    public function todos(SearchTodoRequest $request)
    {
        return Todo::search($request->input('query'))
            ->explain();
    }
}
