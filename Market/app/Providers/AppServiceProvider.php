<?php

namespace App\Providers;

use App\Services\PrayerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PrayerService::class, function ($app) {
            return new PrayerService(new \GuzzleHttp\Client());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
