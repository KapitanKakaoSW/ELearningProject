<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class AdminMiddleware {
    public function handle($request, Closure $next) {
        Log::info('AdminMiddleware invoked');

        if (auth()->check() && auth()->user()->role === 'admin') {
            Log::info('User is admin');
            return $next($request);
        }

        Log::info('User is not admin, redirecting');
        return redirect('/home');
    }
}
