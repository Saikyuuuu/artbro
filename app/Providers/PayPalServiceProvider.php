<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PayPalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(ApiContext::class, function () {
            $paypalConfig = config('paypal');
            $apiContext = new ApiContext(new OAuthTokenCredential(
                $paypalConfig['sandbox']['client_id'],
                $paypalConfig['sandbox']['client_secret']
            ));


            $apiContext->setConfig([
                'mode' => $paypalConfig['mode'],
            ]);

            return $apiContext;
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
