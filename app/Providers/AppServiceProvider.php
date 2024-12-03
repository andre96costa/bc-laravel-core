<?php

namespace App\Providers;

use App\Http\Controllers\CieloController;
use App\Http\Controllers\StripController;
use App\Services\PaymentProviders\CieloPaymentProvider;
use App\Services\PaymentProviders\Interfaces\PaymentProviderInterface;
use App\Services\PaymentProviders\PaddlePaymentProvider;
use App\Services\PaymentProviders\StripePaymentProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(PaymentProviderInterface::class, PaddlePaymentProvider::class);
        $this->app->bind('stripe-provider', fn($app) => $app->make(StripePaymentProvider::class));

        $this->app->when(StripController::class)
            ->needs(PaymentProviderInterface::class)
            ->give(StripePaymentProvider::class);

        $this->app->when(CieloController::class)
            ->needs(PaymentProviderInterface::class)
            ->give(CieloPaymentProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
