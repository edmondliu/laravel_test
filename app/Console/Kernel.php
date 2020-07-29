<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('sync_user zhaocan')->everyMinute()->runInBackground()->withoutOverlapping(2 * 60);
        $schedule->call(function () { // 工作日（周一至周五） 15点 至 17 点每分钟时执行一次...
            Log::channel('crontab')->info('this is every minute 闭包');
        })->weekdays()->everyMinute()->timezone('Asia/Shanghai')->between('15:00', '17:00');;
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
