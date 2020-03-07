<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = cache('locale');

        if ($request->has('locale')) {
            $locale = $request->input('locale');
        }

        App::setLocale($locale);

        cache()->put('locale', $locale);

        return $next($request);
    }
}
