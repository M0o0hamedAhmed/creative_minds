<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtWebAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        try {
            // Get the token from the request header or cookie
            $token = $request->header('Authorization') ?: $request->cookie('jwt_token');

            // Check if the token is valid
            $user = JWTAuth::parseToken()->authenticate();

            // Set the authenticated user in the request
            $request->auth = $user;

            return $next($request);
        } catch (Exception $e) {
            // Redirect to the login page if the token is invalid or expired
            return redirect('/login');
        }
    }
}
