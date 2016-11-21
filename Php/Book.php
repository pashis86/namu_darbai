<?php
/**
 * Created by PhpStorm.
 * User: eimantas
 * Date: 16.11.15
 * Time: 10.46
 */

namespace Nd2\Php;


class Book
{

    private $bookId;

    private $title;

    private $year;

    private $authors;

    private $genre;

    public function __construct($row)
    {
        $this->bookId = $row['bookId'];
        $this->title = $row['title'];
        $this->year = $row['year'];
        $this->genre = $row['genre'];
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     * @return Book
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     * @return Book
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @param mixed $bookId
     * @return Book
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
    * @param mixed $authors
    * @return Book
    */
    public function setAuthors($authors)
    {
        $this->authors = $authors;
        return $this;
    }



}