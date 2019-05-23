<?php

namespace App\Scrapers;

interface Source
{
    public function getContent();
    public function getTitle($book);
    public function getAuthor($book);
    public function getCount($book);
    public function getImage($book);
    public function getYear($book);
}