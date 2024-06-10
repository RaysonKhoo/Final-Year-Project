<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class SessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Get the last activity timestamp from the session
            $lastActivity = Session::get('last_activity', 0);

            // Check if the session has expired
            if (time() - $lastActivity > config('session.lifetime') * 60) {
                // Log the user out and redirect to the login page
                Auth::logout();
                return redirect('login');
            }
        }

        // Update the last activity timestamp
        Session::put('last_activity', time());

        return $next($request);
    }
}
