<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //To check if HTTP requests are originating from specific countries
        $allowedCountry = [
            'us',
            'uk',
            'in',
            'bd'
        ];

        //To check - http://127.0.0.1:8000/?country=uk

        if(!in_array($request->country,$allowedCountry) && !request()->is('unavailable'))
        {
            return redirect()->route('unavailable');
        }
        //If validation success we will forward our request to next or else we will redirect to route or view page describing the error occurred
        return $next($request);
    }
}
