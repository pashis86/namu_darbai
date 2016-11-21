<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Book list</title>
</head>
<body>
<?php

use Nd2\Php\Book;
use Nd2\Php\DbConnection;

require_once '../Php/DbConnection.php';
require '../Php/Book.php';

$db = new DbConnection();
$books = $db->findAllBooks();


foreach ($books as $key => $book) {
    $books[$key] = new Book($book);
}
?>
<div>
    <table>
        <th>Id</th>
        <th>Title</th>
        <th>Year</th>
        <th>Genre</th>
        <?php
        /** @var Book $book */
        foreach ($books as $book) {;
            $id = $book->getBookId();
            $title = $book->getTitle();
            $genre = $book->getGenre();
            $year = $book->getYear();
            ?>
            <tr>
                <td><?php echo "<a href='book.html.php?book=".$id."'>$id</a>"; ?></td>
                <td><?php echo "<a href='book.html.php?book=".$id."'>$title</a>"; ?></td>
                <td><?php echo "<a href='book.html.php?book=".$id."'>$genre</a>"; ?></td>
                <td><?php echo "<a href='book.html.php?book=".$id."'>$year</a>"; ?></td>
            </tr>
        <?php } ?>
        </table>
</body>
</html>