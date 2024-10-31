<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request); // Allow access
        }

        // If not admin, redirect to login with an error message
        return redirect()->route('auth.login')->withErrors([
            'access_denied' => 'You do not have access to the admin area.',
        ]);
    }
}
