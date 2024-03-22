<?php
require_once "./Author.php";
class Book
{
    static public $library = array();
    public $title;
    public $author;
    public $publisher;

    public $publication_year;
    public $genre;
    public $page_count;
    public $language;
    public $summary;
    public $price;


    #dependency injection..below 
    public function __construct($title, Author $author, $publisher, $publication_year, $genre, $page_count, $language, $summary, $price)
    {
        self::$library[] = $this;
        $this->title = $title;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->publication_year = $publication_year;
        $this->genre = $genre;
        $this->page_count = $page_count;
        $this->language = $language;
        $this->summary = $summary;
        $this->price = $price;

    }


    public function booklista(): array
    {

        return self::$library;


    }

}