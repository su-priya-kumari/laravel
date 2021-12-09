<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
    //     if (!Auth::guard('patient')->is_email_verified) {
    //         auth()->logout();
    //         return redirect()->intended('authentication/login')
    //                 ->with('message', 'You need to confirm your account. We have sent you an activation code, please check your email.');
    //       }
        return $next($request);
    }
}
