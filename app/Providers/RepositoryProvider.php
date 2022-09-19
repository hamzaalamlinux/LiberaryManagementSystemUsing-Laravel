<?php

namespace App\Providers;

use App\Repository\Books\EloquestBooks;
use App\Repository\Books\IBookRepository;
use App\Repository\BooksImages\EloquentBooksImages;
use App\Repository\BooksImages\IBookImagesRepository;
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

        /** For Books Repository */
        $this->app->singleton(IBookRepository::class , EloquestBooks::class);

        /** For Books Images */
        $this->app->singleton(IBookImagesRepository::class , EloquentBooksImages::class);
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
