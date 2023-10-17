<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    // defining commands
    protected $commands=[

Commands\TestCron::class,

    ];
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('Test:Cron')->everyMinute();
{
    $schedule->job(new \App\Jobs\SendEmailJob('sardarnawaz122@gmail.com'))
             ->everyTwoSeconds(); // Schedule the job to run daily
}

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
