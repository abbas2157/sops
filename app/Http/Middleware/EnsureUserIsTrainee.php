<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;

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
            if (!empty(Cookie::get('course'))) {
                $uuid = Cookie::get('course');
                Cookie::queue(Cookie::forget('course'));
                return redirect()->route('course', ['uuid' => $uuid]);
            }
            return $next($request);
        }
        Auth::logout();
        return redirect('login');
    }
}
