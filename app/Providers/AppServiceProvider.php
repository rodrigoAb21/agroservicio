<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);
        Carbon::setLocale('es');  ##Determinamos el idioma español
        ##setlocale(LC_TIME, 'es_ES');
        setlocale(LC_TIME, 'es_ES.utf8');
        ##Carbon::setUTF8(true);  ##Para el manejo de las tildes en los días que llevan acento

        
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
