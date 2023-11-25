<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifySecretKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $secretKey = '7dGh91kLp3ZsT4Qr';
        $key = $request->header('x-secret-key');

        if ($key != $secretKey) {
            return response()->json(['message' => 'Invalid secret key'], 401);
        }

        return $next($request);
    }
}
