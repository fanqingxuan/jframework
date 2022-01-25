<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class SampleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample:hello {name} {--yes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hello description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Cache::put("test",'hello world');
        $this->info("you get the input name:".$this->argument('name'));
        $this->info("You choice:".$this->option('yes'));
        file_put_contents('./a.txt',date('Y-m-d H:i:s').$this->argument('name')."\n",FILE_APPEND);
    }
}
