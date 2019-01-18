<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Para prevenir unos errores respecto a la longitud de un string
        Schema::defaultStringLength(191);

        //Para cambiar el nombre de los verbos de arquitectura REST
        Route::resourceVerbs([
          'create' => 'crear',
          'edit' => 'editar'
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
