<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsMember
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'member') {
            return $next($request);
        }

        return redirect('/headpage/headpage');
    }
}
