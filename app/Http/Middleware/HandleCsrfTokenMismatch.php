<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpFoundation\Response;

class HandleCsrfTokenMismatch
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            return $next($request);
        } catch (TokenMismatchException $exception) {
            // If it's a Livewire request, redirect to refresh the page
            if ($request->header('X-Livewire')) {
                return response()->json([
                    'message' => 'Your session has expired. Please refresh the page.',
                    'redirect' => $request->url()
                ], 419);
            }

            // For regular requests, redirect back with an error message
            return redirect()->back()
                ->withInput($request->except('_token'))
                ->with('error', 'Your session has expired. Please try again.');
        }
    }
}
