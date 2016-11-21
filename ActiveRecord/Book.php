<?php
/**
 * Created by PhpStorm.
 * User: eimantas
 * Date: 16.11.15
 * Time: 10.46
 */

namespace Nd2\ActiveRecord;


class Book
{

    private $bookId;

    private $title;

    private $year;

    private $authors;

    private $genre;

    public function __construct($row)
    {
        $this->title = $row['title'];
        $this->year = $row['year'];
        $this->genre = $row['genre'];
        $this->authors = $row['authors'];
        $this->bookId = $row['bookId'];
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


    static function load($id)
    {
        $connection =  new \PDO("mysql:host=localhost;dbname=books", 'root', '');

        $stmt = $connection->prepare('SELECT Books.*, GROUP_CONCAT(Authors.name) AS authors FROM Books 
        LEFT JOIN bookAuthors ON Books.bookId = bookAuthors.bookId
        LEFT JOIN Authors ON Authors.authorId=bookAuthors.authorId
        WHERE Books.bookId = :id');
        $stmt->bindParam('id', $id);
        $stmt->execute();

        $row = $stmt->fetch();

        return new Book($row);
    }

    static function loadAll()
    {
        $connection =  new \PDO("mysql:host=localhost;dbname=books", 'root', '');

        $stmt = $connection->prepare('SELECT Books.*, GROUP_CONCAT(Authors.name) AS authors FROM Books
        LEFT JOIN bookAuthors ON Books.bookId = bookAuthors.bookId
        LEFT JOIN Authors ON  Authors.authorId=bookAuthors.authorId
        GROUP BY Books.title;');
        $stmt->execute();

        $objArray = $stmt->fetchAll();
        foreach ($objArray as $key => $obj){
            $objArray[$key] = new Book($obj);
        }
        return $objArray;
    }
}