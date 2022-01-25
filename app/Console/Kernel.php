<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use JFramework\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    ];

    public function bootstrap()
    {
        $this->load(__DIR__.'/Commands');
    }

    protected function schedule(Schedule $schedule)
    {
        $schedule->command("sample:hello test")->everyMinute();
        $schedule->command("sample:hello dddd")->cron("2 * * * *");
    }
}
