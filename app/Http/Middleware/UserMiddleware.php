<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if(Auth::user()->role_as == 0)
            {
                session(['role' => 'user']);
                return $next($request);
            }
            else if(Auth::user()->role_as == 1)
            {
                session(['role' => 'admin']);
                return $next($request);
            }
            else
            {
                return redirect('/user/')->with('status','Access Denied!');
            }
        }
        else
        {
            return redirect('/user/')->with('status','Please Login First');
        }
    }
}
