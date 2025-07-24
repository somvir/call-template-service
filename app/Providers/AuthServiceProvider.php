<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\CallTemplate;
use App\Policies\CallTemplatePolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        CallTemplate::class => CallTemplatePolicy::class,
    ];

    public function boot(): void
    {

    }
}
