<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Ensure this is imported

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated AND if their 'is_admin' column is set to 1
        if (!Auth::check() || Auth::user()->is_admin !== 1) {
            // Redirect to the home page with an error message
            return redirect('/')->with('error', 'You do not have administrative access.');
        }

        return $next($request);
    }
}