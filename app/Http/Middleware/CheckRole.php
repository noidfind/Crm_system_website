<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!session('user_id')) {
            return redirect('/');
        }

        $userRole = session('user_role');
        
        if (!in_array($userRole, explode(',', $roles[0]))) {
            abort(403, 'Bu sayfaya erişim yetkiniz yok.');
        }

        return $next($request);
    }
} 