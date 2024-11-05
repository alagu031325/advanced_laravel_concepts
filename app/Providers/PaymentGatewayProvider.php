<?php

namespace App\Providers;

use App\Services\PaymentGateway;
use Illuminate\Support\ServiceProvider;

class PaymentGatewayProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentGateway::class, function(){
            //show how to create instance of PaymentGateway - for demonstration purposes - hardcoding apiKey
            return new PaymentGateway('Qwerty1234');
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
