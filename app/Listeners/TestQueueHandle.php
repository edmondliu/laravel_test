<?php

namespace App\Listeners;

use App\Events\TestQueueEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class TestQueueHandle implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * The name of the connection the job should be sent to.
     *
     * @var string|null
     */
    public $connection = 'redis'; // 监听的队列是redis链接
    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public $queue = 'default'; // 队列名称,这里根据配置进行选择
    /**
     * The time (seconds) before the job should be processed.
     *
     * @var int
     */
    public $delay = 60;

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
     * @param  TestQueueEvent  $event
     * @return void
     */
    public function handle(TestQueueEvent $event)
    {
        //
        Log::channel('crontab')->info('this is a test queue handle');
    }

    public function failed(TestQueueEvent $event, $exception)
    {

    }
}
