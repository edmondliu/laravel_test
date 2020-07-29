<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class ProcessPodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $dataArray;

    /**
     * Create a new job instance.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        // 当前job需要处理的事情，这里是异步的
        Log::channel('crontab')->info('ProcessPodcast is begin' . date('Y-m-d H:i:s'));
        sleep(5);
        Log::channel('crontab')->info('ProcessPodcast is end' . date('Y-m-d H:i:s'));
        throw new \Exception('this is exception');
    }

    public function failed(\Exception $exception)
    {
        Log::channel('crontab')->info('ProcessPodcast is failed' . date('Y-m-d H:i:s') . ' ' . $exception->getMessage());
    }
}
