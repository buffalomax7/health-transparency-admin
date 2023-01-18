<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class TestFilesRead extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:read';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Digital Ocean Read';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $contents = Storage::get('test-file.log');
        $this->info($contents);
        return Command::SUCCESS;
    }
}
