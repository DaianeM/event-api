<?php

namespace App\Providers;

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
        $this->app->bind(

            'App\Repositories\EventoRepositoryInterface',
            'App\Repositories\EventoRepositoryEloquent',

        );

        $this->app->bind(

            'App\Repositories\ParticipRepositoryInterface',
            'App\Repositories\ParticipRepositoryEloquent'
        );


    }
}
