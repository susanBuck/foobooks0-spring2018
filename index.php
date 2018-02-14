<?php
require 'helpers.php';
require 'logic.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Foobooks0</title>
    <meta charset='utf-8'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'
          rel='stylesheet' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm'
          crossorigin='anonymous'>

    <link href='styles.css' rel='stylesheet'>
</head>
<body>

<h1>Foobooks0</h1>

<p class='intro'>
    Welcome to foobooks0! Start by searching our library by book title.
</p>

<form method='POST' action='index.php'>

    <label>Search for a book:
        <input type='text' name='searchTerm' value='<?= sanitize($searchTerm) ?>'>
    </label>

    <label>
        <input type='checkbox' name='caseSensitive' value='1' <?= ($caseSensitive) ? 'checked' : '' ?>>
        Case sensitive
    </label>

    <input type='submit' value='Search' class='btn btn-primary'>

</form>

<?php if ($searchTerm): ?>
    <p>You searched for <em><?= sanitize($searchTerm) ?></em></p>
<?php endif ?>

<?php if ($haveResults): ?>
    <?php foreach ($books as $title => $book): ?>
        <div class='book'>
            <div class='title'><?= $title ?></div>
            <div class='author'>by <?= $book['author'] ?></div>
            <img src='<?= $book['cover_url'] ?>' alt='Cover photo for the book <?= $title ?>'>
        </div>
    <?php endforeach ?>

<?php elseif ($searchTerm): ?>
    <div class='alert alert-danger'>No results</div>
<?php endif; ?>

<footer>
    <a href='http://github.com/susanBuck/foobooks0'>View on Github</a>
</footer>

</body>
</html>