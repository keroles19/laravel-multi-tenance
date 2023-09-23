<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        if ($request->user() && $request->user()->hasRole($role)) {
            return $next($request);
        }

        return abort(403);
    }

}
