<?php

namespace App\Console;

use App\Console\Commands\HelloCommand;
use JFramework\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        HelloCommand::class
    ];

    public function bootstrap()
    {
        $this->load(__DIR__.'/Commands');
    }
}
