<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SessionAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && time() - session('last_activity') > config('session.lifetime') * 120) {
            auth()->logout();
            return redirect('/login')->with('status', 'Your session has expired due to inactivity.');
        }

        session(['last_activity' => time()]);

        // if (Auth::check()) {
        //     return redirect()->route('admin.dashboard');
        // }
        return $next($request);
    }
}
