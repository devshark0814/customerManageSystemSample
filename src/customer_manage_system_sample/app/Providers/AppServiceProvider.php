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
        $this->app->bind(
            \App\Repositories\TCustomer\TCustomerRepositoryInterface::class,
            \App\Repositories\TCustomer\TCustomerRepository::class,
        );

        $this->app->bind(
            \App\Repositories\MEmployee\MEmployeeRepositoryInterface::class,
            \App\Repositories\MEmployee\MEmployeeRepository::class,
        );
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
