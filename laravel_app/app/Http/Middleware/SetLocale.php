<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if (session('locale')) {
            App::setLocale(session('locale'));
        } else {
            App::setLocale('en'); // Define o padrão se não houver na sessão
        }

        return $next($request);
    }
}
