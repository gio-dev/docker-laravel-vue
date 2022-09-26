<?php

namespace App\Providers;

use App\Repository\Contracts\HomeAppliancesRepositoryInterface;
use App\Repository\HomeAppliancesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            HomeAppliancesRepositoryInterface::class,
            HomeAppliancesRepository::class
        );
    }
}
