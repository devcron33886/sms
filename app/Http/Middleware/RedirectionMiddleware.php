<?php

namespace App\Http\Middleware;

use App\Models\User;
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
        $user = \Auth::user();
        if ($user->roles() == ['Student']){
            return redirect()->route('admin.overviews.index');

        }
        elseif ($user->roles() == ['Admin'])
        {
            return redirect()->route('admin.home');
        }
        return $next($request);
    }
}
