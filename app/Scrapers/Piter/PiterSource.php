<?php

namespace App\Scrapers\Piter;

use App\Scrapers\{
    MainSource,
    Source
};

use Exception;
use Log;
use Goutte;

class PiterSource extends MainSource implements Source
{
    private $baseUrl = 'https://www.piter.com';

    public function __construct($url)
    {
        parent::__construct($url);
    }

    /**
     * Get content for table books and table authors
     *
     * @return void
     */
    public function getContent()
    {
        $books = $this->crawler->filter('.products-list .prod-block');

        if (count($books) === 0) return;

        $books->each(function($book) {
            $author = $this->getAuthor($book);
            $newAuthor = $this->authorService->store($author);

            $bookData = [
                'title'      => $this->getTitle($book),
                'year'       => $this->getYear($book),
                'image_path' => $this->getImage($book),
                'count'      => $this->getCount($book),
            ];

            $this->bookService->store($bookData, $newAuthor->id);
        });
    }

    /**
     * Get title
     * @param $book
     *
     * @return mixed  title
     */
    public function getTitle($book)
    {
        try {
            return $book->filter('.title')->text();
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' PiterSource getTitle');

            return NULL;
        }
    }

    /**
     * Get author
     * @param $book
     *
     * @return mixed  author
     */
    public function getAuthor($book)
    {
        try {
            return $book->filter('.author')->text();
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' PiterSource getAuthor');

            return NULL;
        }
    }

    /**
     * Get count
     * @param $book
     *
     * @return mixed  count
     */
    public function getCount($book)
    {
        try {
            return $book->filter('.padded-left .price')->text();
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' PiterSource getCount');

            return NULL;
        }
    }

    /**
     * Get image path
     * @param $book
     *
     * @return mixed  image path
     */
    public function getImage($book)
    {
        try {
            $bookImagePath = $book->filter('.img img')->extract(['src'])[0];

            return $this->getImagePath($bookImagePath);
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' PiterSource getImagePath');

            return NULL;
        }
    }

    /**
     * Get year
     * @param $book
     *
     * @return mixed  year
     */
    public function getYear($book)
    {
        try {
            $bookPageUrl = $book->filter('a')->extract(['href'])[0];
            $bookCrawler = Goutte::request('GET', $this->baseUrl . $bookPageUrl);

            return (int) $bookCrawler->filter('.params li')->eq(1)->filter('.grid-7')->text();
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' PiterSource getYear');

            return NULL;
        }
    }
}