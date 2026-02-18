<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Config\PaymentConfig;
use App\Services\Payments\Contracts\PaymentStrategy;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(PaymentConfig::class, fn () =>
            PaymentConfig::getInstance()
        );

        $this->app->bind(
            PaymentStrategy::class,
        );


    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
