<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Scrapers\Piter\PiterScraper;

class Scraper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scraper';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run scraper';

    protected $piterScraper;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PiterScraper $piterScraper)
    {
        parent::__construct();

        $this->piterScraper = $piterScraper;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->piterScraper->takeSource();
    }
}
