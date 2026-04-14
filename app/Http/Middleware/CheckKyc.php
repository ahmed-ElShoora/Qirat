<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Traits\ApiResponse;
class CheckKyc
{
    use ApiResponse;
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $type): Response
    {
        $user = auth()->user();

        $kyc = $user->kyc()
            ->where('type', $type)
            ->where('status', 'approved')
            ->first();

        if (!$kyc) {
            return $this->errorResponse(403, 'KYC not approved');
        }

        return $next($request);
    }
}
