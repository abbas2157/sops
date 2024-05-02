<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsTrainee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->type == 'trainee')
        {
            if(is_null(Auth::user()->trainee) && (!$request->has('details')))
            {
                return redirect('trainee/profile?details');
            }
            return $next($request);
        }
        Auth::logout();
        return redirect('login');
    }
}
