<?php

namespace App\Scrapers;

abstract class MainScraper
{
    abstract public function makeScraper() : Source;

    public function takeSource()
    {
        $source = $this->makeScraper();
        $source->getContent();
    }
}