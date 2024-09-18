<?php

namespace App\Http\Middleware;

use App\Mail\emailverify;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class check_verify_email
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        if (!Auth::check()) {
            return redirect()->route('login')->with('message','Please login first!');
        }
        if (Auth::user()->email_verified_at === Null) {
            Mail::to(Auth::user()->email)->send(new emailverify(Auth::user()));
            return redirect()->route('verify')->with('message','Please verify you email first!');
        }
        return $next($request);
    }
}
