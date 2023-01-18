<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class TestFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file:upload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test Digital Ocean Upload';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = 'https://secure.claraprice.net/price-transparency/5f74941f84/machine-readable/99-0269825_wahiawa-general-hospital_standardcharges.json';
        $url ='https://secure.claraprice.net/price-transparency/NWM3481600293/machine-readable/75-6003896_rolling-plains-memorial-hospital_standardcharges.json';

        $data = Http::accept('application/json')->get($url);

        Storage::disk('do')->append('crawl-files/75-6003896_rolling-plains-memorial-hospital_standardcharges.json', $data);

        return Command::SUCCESS;
    }
}
