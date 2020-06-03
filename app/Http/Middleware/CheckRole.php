<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$roles)
    {
        $user = Auth::user();
        $rolesArray = explode(';', $roles);
        if(in_array($user->role, $rolesArray)){
            return $next($request);
        }else{
            return response()->view('errors.503', [], 503);
        }
    }

}
