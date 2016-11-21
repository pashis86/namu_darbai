<?php
/**
 * Created by PhpStorm.
 * User: eimantas
 * Date: 16.11.15
 * Time: 10.14
 */

namespace Nd2\DDD;


class DbConnection
{
    private $connection;

    public function __construct()
    {
        $this->connection = new \PDO("mysql:host=localhost;dbname=books", 'root', '');

        if(!$this->connection){
            die('Could not conenct to database');
        }
    }

    /**
     * @return \PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param \PDO $connection
     * @return DbConnection
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
        return $this;
    }

    public function findById($id)
    {
        $stmt = $this->connection->prepare('SELECT Books.*, GROUP_CONCAT(Authors.name) AS authors FROM Books 
        LEFT JOIN bookAuthors ON Books.bookId = bookAuthors.bookId
        LEFT JOIN Authors ON Authors.authorId=bookAuthors.authorId
        WHERE Books.bookId = :id');
        $stmt->bindParam('id', $id);
        $stmt->execute();

        return new Book($stmt->fetch());
    }

    public function findAllBooks()
    {
        $stmt = $this->connection->prepare('SELECT Books.*, GROUP_CONCAT(Authors.name) AS authors FROM Books
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