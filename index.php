<?php
require 'helpers.php';
require 'logic.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>

    <title>Foobooks0</title>
    <meta charset='utf-8'>

</head>
<body>

<h1>Foobooks0</h1>

<?php foreach ($books as $title => $book): ?>
    <div class='book'>
        <?= $title ?> by <?= $book['author'] ?>
        <img src='<?= $book['cover_url'] ?>' alt='Cover photo for the book <?= $title ?>'>
    </div>
<?php endforeach ?>

</body>
</html>