<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book</title>
</head>
<body>
<?php
use Nd2\ActiveRecord\Book;

require '../ActiveRecord/Book.php';

    if(isset($_GET['book'])) {
        $book = Book::load($_GET['book']);
    }
        ?>
        <div>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Year</th>
                    <th>Authors</th>
                    <th>Genre</th>
                </tr>
                <tr>
                    <td><?php echo $book->getTitle() ?></td>
                    <td><?php echo $book->getYear() ?></td>
                    <td><?php echo $book->getAuthors() ?></td>
                    <td><?php echo $book->getGenre() ?></td>
                </tr>
            </table>
        </div>
<a href="booklist.html.php">Back to list</a>
</body>
</html>