<?php

namespace App\Listeners;

use App\Events\OrderShippedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SendShipmentNotificationHandle
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
     * @param  OrderShippedEvent  $event
     * @return void
     */
    public function handle(OrderShippedEvent $event)
    {
        Log::channel('crontab')->info('this is a event test', $event->dataArray);
    }
}
