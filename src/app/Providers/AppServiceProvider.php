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
        $this->app->bind('App\Interfaces\ContactRepositoryInterface', 'App\Repositories\ContactRepository');
        $this->app->bind('App\Interfaces\PageRepositoryInterface', 'App\Repositories\PageRepository');
        $this->app->bind('App\Interfaces\ImageServiceInterface', 'App\Services\ImageService');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
