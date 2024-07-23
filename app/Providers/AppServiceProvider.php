<?php

namespace App\Providers;

use App\Interfaces\Api\Guest\Services\GuestServiceInterface;
use App\Services\Api\Guest\GuestService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GuestServiceInterface::class, GuestService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
