<?php

namespace App\Http\Middleware;

use App\Models\Currency;
use Closure;
use Illuminate\Http\Request;

class CurrencyCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->hasHeader('x-currency'))
            return response()->json(['message'=>' `x-currency` Header That Holds The Currency Code  is missing !!!'],401);
        if (!Currency::where('code','=',strtoupper($request->header('x-currency')))->first())
            return response()->json(['message'=>'Not Supported Currency'],401);
        return $next($request);
    }
}
