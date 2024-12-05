<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\Interfaces\UniversityRepositoryInterface::class,
            \App\Repositories\Eloquent\UniversityRepository::class
        );

        $this->app->bind(
            \App\Repositories\Interfaces\DegreeProgramRepositoryInterface::class,
            \App\Repositories\Eloquent\DegreeProgramRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
