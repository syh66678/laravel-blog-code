<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\TestCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        //每分钟运行一次
        //$schedule->command('queue:work')->everyMinute();
        // 每5分钟运行一次
        //$schedule->command('queue:work')->everyFiveMinutes();

        // 一天运行一次
        //$schedule->command('queue:work')->daily();

        $schedule->command('command:mytest')//Test.php中的name
                //->everyMinute(); //每分钟执行一次
                 ->everyFiveMinutes();//每五分钟执行一次

        //Horizon 提供了一个监控后台查看任务和队列的等待时间和吞吐量信息，为了获取实时信息，可以配置 Horizon 的 Artisan 命令  snapshot 通过应用的调度器每五分钟运行一次：
        $schedule->command('horizon:snapshot')->everyFiveMinutes();

        // 每个星期一早上8:15运行
        //$schedule->command('queue:work')->weeklyOn(1, '8:15');

        //* * * * * php /home/vagrant/blog/artisan schedule:run >> /dev/null 2>&1

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
