<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Traits\ApiResponse;

class ApiPassword
{
    use ApiResponse;
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('api_password') != null && $request->header('api_password') == env('API_PASSWORD')){
            return $next($request);
        }
        return $this->errorResponse(401,'Invalid API Password');
    }
}
