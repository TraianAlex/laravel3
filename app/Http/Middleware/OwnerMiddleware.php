<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class OwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)//owner
    {
        $id = $request->segment(2);
        if (Auth::id() !== (int) $id) return redirect('users');
        return $next($request);
    }
}
