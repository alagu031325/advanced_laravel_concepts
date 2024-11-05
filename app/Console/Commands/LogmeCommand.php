<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LogmeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:me';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Log some data into the log file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        return logger(' This is a new log from LogmeCommand ->'. date('d-m-Y H:i:s'));
    }
}
