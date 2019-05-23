<?php

namespace App\Scrapers\Piter;

use App\Scrapers\MainScraper;
use App\Scrapers\Source;

class PiterScraper extends MainScraper
{
    protected $url = 'https://www.piter.com/collection/biblioteka-programmista?page_size=12&order=descending_age&q=&only_available=true';

    public function makeScraper() : Source
    {
        return new PiterSource($this->url);
    }
}