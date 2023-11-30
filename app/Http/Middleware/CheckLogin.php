<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('users')->user();
        if ($user)
        {
            if ($user->role=='admin') return  redirect()->route('admin.home');
            if ($user->role=='client') return  redirect()->route('client.home');
            if ($user->role=='user') return  redirect()->route('user.home');
        }
        return $next($request);
    }
}
