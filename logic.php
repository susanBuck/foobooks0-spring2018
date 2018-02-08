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
$searchTerm = isset($_POST['searchTerm']) ? $_POST['searchTerm'] : '';
$caseSensitive = isset($_POST['caseSensitive']) ? true : false;

# Version 3 Using a null coalescing operator
//$searchTerm = $_GET['searchTerm'] ?? '';



if ($searchTerm) {

    foreach ($books as $title => $book) {

        if($caseSensitive) {
            $match = $title == $searchTerm;
        } else {
            $match = strtolower($title) == strtolower($searchTerm);
        }

        if(!$match) {
            unset($books[$title]);
        }
    }

    if (count($books) > 0) {
        $haveResults = true;
    }
}

