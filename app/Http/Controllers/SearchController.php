<?php

namespace App\Http\Controllers;

use App\Http\Requests\Search\SearchTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use App\Jobs\TmpJob;

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
        $query = $request->input('query');
        /*
        for($i = 0; $i < 2000; $i++)
        {
            dispatch(new TmpJob($query));
        }
        */

        return Todo::search($request->input('query'))
            ->get();
            //->explain();
    }
}
