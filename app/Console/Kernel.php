<?php

namespace App\Console;

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
}
