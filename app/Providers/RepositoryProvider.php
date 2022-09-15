<?php

namespace App\Providers;

use App\Repository\Login\EloquentLoginRepository;
use App\Repository\Login\IloginRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IloginRepository::class , EloquentLoginRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
