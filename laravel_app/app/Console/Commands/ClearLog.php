<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearLog extends Command
{
    protected $signature = 'log:clear';
    protected $description = 'Clear the application log file';

    public function handle()
    {
        file_put_contents(storage_path('logs/laravel.log'), '');
        $this->info('Log file cleared!');
    }
}
