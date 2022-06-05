<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use URL;
use Carbon\Carbon; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        URL::ForceScheme('https');
        Carbon::setLocale('es');
        setlocale(LC_TIME, 'es_ES');
        Carbon::setUTF8(true);
    }
}
