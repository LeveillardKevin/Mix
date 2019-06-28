<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\NameSaving as EventNameSaving;
use Illuminate\Support\Str;

class NameSaving
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EventNameSaving $event)
    {
        $event->model->slug = Str::slug($event->model->name, '-');
    }
}
