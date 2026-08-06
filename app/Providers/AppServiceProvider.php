<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
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
        if ($this->app->environment('production')) {
            // Render service hostnames can receive a generated suffix. Always
            // derive asset URLs from the current request instead of a stale
            // ASSET_URL value saved in the Render dashboard.
            URL::useAssetOrigin(null);
            URL::forceScheme('https');
        }
    }
}
