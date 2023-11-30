<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\checkLoginUser as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    /**
     * Get the path the user should be redirected to when they are not checkLoginUserd.
     */
    protected function redirectTo(Request $request, Closure $next): ?string
    {

        $check = Auth::guard('users')->user()->role == 'user';
        dd($check);
        if ($check) {
            return $next($request);
        } else {
            return redirect()->route('auth');
        }
    }
}
