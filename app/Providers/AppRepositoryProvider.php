<?php

namespace App\Providers;

use App\Interfaces\Api\Guest\Repositories\CountryRepositoryInterface;
use App\Interfaces\Api\Guest\Repositories\GuestRepositoryInterface;
use App\Repositories\Api\Country\CountryRepository;
use App\Repositories\Api\Guest\GuestRepository;
use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(GuestRepositoryInterface::class, GuestRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
