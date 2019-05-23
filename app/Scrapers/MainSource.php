<?php

namespace App\Scrapers;

use App\Helpers\ImageHelper;

use App\Services\{
    AuthorService,
    BookService
};

use Goutte;

class MainSource
{
    protected $crawler;
    protected $imageHelper;
    protected $authorService;
    protected $bookService;

    public function __construct($url)
    {
        $this->crawler = Goutte::request('GET', $url);
        $this->imageHelper = new ImageHelper();
        $this->authorService = new AuthorService();
        $this->bookService = new BookService();
    }

    /**
     * Get path for image
     *
     * @param  string $imageUrl url with image
     *
     * @return path for image
     */
    public function getImagePath($imageUrl)
    {
        $format = 'png';

        list($width, $height, $type) = getimagesize($imageUrl);

        if ($type == 2) $format = 'jpeg';

        return $this->imageHelper->store($imageUrl, $format);
    }
}