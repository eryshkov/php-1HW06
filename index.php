<?php
require_once __DIR__ . '/classes/GuestBook.php';

$myGuestBook = new GuestBook(__DIR__ . '/guestBook.txt');
$guestBookRecords = $myGuestBook->getData();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>

    <title>Гостевая книга</title>
</head>
<body>
<p></p>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/" class="btn btn-primary">Гостевая книга</a>
            <a href="/gallery.php" class="btn btn-primary">Галерея</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1>Гостевая книга.</h1>
        </div>
    </div>
    <?php
    foreach ($guestBookRecords as $record) {
        ?>
        <div class="row">
            <div class="col">
                <?php
                echo $record;
                ?>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="col">
            <p></p>
            <form action="/addRecord.php" method="post" enctype="multipart/form-data">
                <label>Новая запись:</label><br>
                <textarea name="message" rows="10" cols="30" placeholder="Запись в книгу"></textarea><br>
                <button type="submit">Отправить</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
