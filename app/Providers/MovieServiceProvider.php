<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Media\Tmdb;

class MovieServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Tmdb::class, function () {
          return new Tmdb(config('services.tmdb.key'));
        });
    }
}
