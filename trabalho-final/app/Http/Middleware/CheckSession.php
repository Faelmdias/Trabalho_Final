<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('usuario_id')) {
            return redirect()->route('login')
                ->withErrors(['error' => 'Você precisa estar logado']);
        }

        return $next($request);
    }
}
