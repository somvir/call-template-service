<?php

namespace App\Providers;

// app/Providers/EventServiceProvider.php
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \App\Events\TemplateUpdated::class => [
            \App\Listeners\LogTemplateAudit::class,
        ],
    ];

    public function boot(): void
    {
        // Optional: Auto-discover events (Laravel 11+)
        parent::boot();
    }
}