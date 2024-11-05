<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GreetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'greet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Simple command to greet user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        return $this->info('Hello, You are Welcome');
    }
}
