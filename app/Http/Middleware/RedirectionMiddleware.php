<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;

class RedirectionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->access_level == 1)
        {
            return redirect()->route('admin.home');
        }
        elseif (auth()->user()->access_level == 5)
        {
            return redirect()->route('admin.overviews.index');
        }
        return $next($request);
    }
}
