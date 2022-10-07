<?php

namespace App\Providers;

use App\Repository\Books\EloquestBooks;
use App\Repository\Books\IBookRepository;
use App\Repository\BooksImages\EloquentBooksImages;
use App\Repository\BooksImages\IBookImagesRepository;
use App\Repository\BooksRequest\BooksRequestEloquent;
use App\Repository\BooksRequest\IBookRequestRepository;
use App\Repository\Login\EloquentLoginRepository;
use App\Repository\Login\IloginRepository;
use App\Repository\Panelty\EloquentPanelty;
use App\Repository\Panelty\IPaneltyRepository;
use App\Repository\Registeration\EloquentRegister;
use App\Repository\Registeration\IRegisterRepository;
use App\Repository\Users\EloquentUsers;
use App\Repository\Users\IUsersRepository;
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

        /** Add Request For Books */
        $this->app->singleton(IBookRequestRepository::class ,BooksRequestEloquent::class );

        /** For Panelty Userss */
        $this->app->singleton(IPaneltyRepository::class ,EloquentPanelty::class );

        /** For Users Repository */
        $this->app->singleton(IUsersRepository::class ,EloquentUsers::class );
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
