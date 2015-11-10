<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class ExistMiddleware
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
        $id = $request->segment(2);
        $user = User::find($id);
        if ($user == null) return redirect('users');
        return $next($request);
    }
}
