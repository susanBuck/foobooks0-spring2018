<?php

require('Book.php');
require('Form.php');

use Foobooks0\Book;
use DWA\Form;

$form = new Form($_POST);

$book = new Book('books.json');
$haveResults = false;

# Get data from the form
$searchTerm = $form->get('searchTerm', '');
$caseSensitive = $form->has('caseSensitive');

if ($form->isSubmitted()) {
    $errors = $form->validate(
        [
            'searchTerm' => 'required|alphaNumeric',
        ]
    );

    if (!$form->hasErrors) {
        $books = $book->getByTitle($searchTerm, $caseSensitive);

        if (count($books) > 0) {
            $haveResults = true;
        }
    }
}

