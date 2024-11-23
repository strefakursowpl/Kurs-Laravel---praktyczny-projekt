<?php

namespace App\Providers;

use App\Services\AllegroApiService;
use App\Services\AllegroService;
use Illuminate\Support\ServiceProvider;

class CustomProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(AllegroService::class, function($app) {

            $api = new AllegroApiService(env('ALLEGRO_API_KEY'), env('ALLEGRO_API_PW'));

            return new AllegroService($api);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
