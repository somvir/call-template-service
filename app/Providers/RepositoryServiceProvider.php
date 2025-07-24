<?php

namespace App\Providers;

use App\Repositories\Interfaces\CallTemplateRepositoryInterface;
use App\Repositories\EloquentCallTemplateRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            CallTemplateRepositoryInterface::class,
            EloquentCallTemplateRepository::class
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
