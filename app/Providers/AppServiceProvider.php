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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->app->bind('App\Interface\User\UserInterface', 'App\Repositories\User\UserRepository');
        $this->app->bind('App\Interface\Loan\LoanInterface', 'App\Repositories\Loan\LoanRepository');
        $this->app->bind('App\Interface\Transaction\TransactionInterface', 'App\Repositories\Transaction\TransactionRepository');
    }
}
