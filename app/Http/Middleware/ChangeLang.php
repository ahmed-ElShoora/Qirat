<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangeLang
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        App()->setLocale('ar');
        if ($request->header('lang') !== null && $request->header('lang') == 'en')
            App()->setLocale('en');
        return $next($request);
    }
}
