<?php

namespace App\Providers;

use App\Services\PaymentGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Some services can be automatically resolved by laravel - create new binding for services that laravel couldnt resolve 
        //Service providers are used to register our service in service container - we can create our own providers 
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
