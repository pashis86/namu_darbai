<?php
/**
 * Created by PhpStorm.
 * User: eimantas
 * Date: 16.11.15
 * Time: 10.14
 */

namespace Nd2\Php;


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
        $stmt = $this->connection->prepare('SELECT * FROM `Books` WHERE bookId = :id');
        $stmt->bindParam('id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function findAllBooks()
    {
        $stmt = $this->connection->prepare('SELECT * FROM Books');
        $stmt->execute();

        return $stmt->fetchAll();
    }

}