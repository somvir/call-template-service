<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\App;
use App\Repositories\Interfaces\CallTemplateRepositoryInterface;
use App\Repositories\EloquentCallTemplateRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Fix for: Target class [files] does not exist
            App::bind('files', function () {
                return new Filesystem();
            });

            $this->app->bind(
            CallTemplateRepositoryInterface::class,
            EloquentCallTemplateRepository::class
            );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
    }
}
