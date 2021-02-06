<?php

namespace App\Http\Middleware;
use Auth;
use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;


class checkban
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
        if (Auth::check() && Auth::user()->active == '1') {
            return $next($request);
        }
        // abort(500);
        return redirect()->route('index');
    }
}
