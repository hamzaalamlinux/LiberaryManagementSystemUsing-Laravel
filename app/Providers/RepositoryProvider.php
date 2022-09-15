<?php

namespace App\Providers;

use App\Repository\Login\EloquentLoginRepository;
use App\Repository\Login\IloginRepository;
use App\Repository\Registeration\EloquentRegister;
use App\Repository\Registeration\IRegisterRepository;
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
        /** For login Repository */
        $this->app->singleton(IloginRepository::class , EloquentLoginRepository::class);

        /** For Register User Repository */

        $this->app->singleton(IRegisterRepository::class , EloquentRegister::class);
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
