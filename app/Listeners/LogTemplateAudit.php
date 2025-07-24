<?php

namespace App\Listeners;

use App\Events\TemplateUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogTemplateAudit
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TemplateUpdated $event): void
    {
        //
    }
}
