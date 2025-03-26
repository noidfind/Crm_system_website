<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('customer_id')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
} 