<?php

namespace App\Providers;

<<<<<<< HEAD
=======
use Illuminate\Pagination\Paginator;
>>>>>>> ccd36d9 (DashBoard)
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
<<<<<<< HEAD
        //
=======
        Paginator::useBootstrap();
>>>>>>> ccd36d9 (DashBoard)
    }
}
