<?php

require('Book.php');

use Foobooks0\Book;

$book = new Book('books.json');
$haveResults = false;

# Version 1
//if (isset($_GET['searchTerm'])) {
//    $searchTerm = $_GET['searchTerm'];
//} else {
//    $searchTerm = '';
//}

# Version 2 Using a ternary operator
$searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';
$caseSensitive = isset($_POST['caseSensitive']) ? true : false;

# Version 3 Using a null coalescing operator
//$searchTerm = $_GET['searchTerm'] ?? '';

if ($searchTerm) {
    $books = $book->getByTitle($searchTerm, $caseSensitive);

    if (count($books) > 0) {
        $haveResults = true;
    }
}

