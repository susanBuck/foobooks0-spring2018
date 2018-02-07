<?php
$booksJson = file_get_contents('books.json');

$books = json_decode($booksJson, true);

$haveResults = false;

# Version 1
//if (isset($_GET['searchTerm'])) {
//    $searchTerm = $_GET['searchTerm'];
//} else {
//    $searchTerm = '';
//}

# Version 2 Using a ternary operator
$searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';

# Version 3 Using a null coalescing operator
//$searchTerm = $_GET['searchTerm'] ?? '';

if ($searchTerm) {
    foreach ($books as $title => $book) {
        if ($title != $searchTerm) {
            unset($books[$title]);
        }
    }

    if (count($books) > 0) {
        $haveResults = true;
    }
}

