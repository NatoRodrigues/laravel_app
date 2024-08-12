<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
 
    // Define o locale baseado na sessão
    public function boot()
{
    if (session('locale') === 'pt') {
        App::setLocale('pt');
    } else {
        App::setLocale('en'); // Define o padrão se não houver 'pt' na sessão
    }
}
}
