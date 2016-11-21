<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Book list</title>
</head>
<body>
<?php

use Nd2\DDD\Book;
use Nd2\DDD\DbConnection;

require_once '../DDD/DbConnection.php';
require '../DDD/Book.php';

$db = new DbConnection();
$books = $db->findAllBooks();


?>
<div>
    <table>
        <th>Id</th>
        <th>Title</th>
        <th>Year</th>
        <th>Genre</th>
        <th>Authors</th>
        <?php
        /** @var Book $book */
        foreach ($books as $book) {;
            $id = $book->getBookId();
            $title = $book->getTitle();
            $year = $book->getYear();
            $genre = $book->getGenre();
            $authors = $book->getAuthors();
            ?>
            <tr>
                <td><?php echo "<a href='book.html.php?book=".$id."'>$id</a>"; ?></td>
                <td><?php echo "<a href='book.html.php?book=".$id."'>$title</a>"; ?></td>
                <td><?php echo "<a href='book.html.php?book=".$id."'>$year</a>"; ?></td>
                <td><?php echo "<a href='book.html.php?book=".$id."'>$genre</a>"; ?></td>
                <td><?php echo "<a href='book.html.php?book=".$id."'>$authors</a>"; ?>
                    </td>
            </tr>
        <?php } ?>
        </table>
    </div>
</body>
</html>