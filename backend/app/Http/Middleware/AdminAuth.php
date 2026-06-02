<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('admin')) {
            return redirect()->route('login')
                ->withErrors(['username' => 'Please login first.']);
        }

        return $next($request);
    }
}
