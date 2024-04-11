<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportNewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import news from TengriNews.kz';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        exec('python3 app/Scripts/scrap.py');
    }
}
