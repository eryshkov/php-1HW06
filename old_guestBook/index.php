<?php
include __DIR__ . '/functions.php';

$guestBookRecords = readGuestBook(__DIR__ . '/guestBook.txt'); ?>

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
<div class="container">
    <div class="row">
        <h1>Гостевая книга.</h1>
    </div>
    <div class="row">
        <h2>Последние записи:</h2>
    </div>
    <?php
    foreach ($guestBookRecords as $record) {
        ?>
        <div class="row">
            <?php
            echo $record;
            ?>
        </div>
        <?php
    }
    ?>
    <br><br>
    <div class="row">
        <form action="/01/addRecord.php" method="post" enctype="multipart/form-data">
            <label>Новая запись:</label><br>
            <textarea name="message" rows="10" cols="30" placeholder="Запись в книгу"></textarea><br>
            <button type="submit">Отправить</button>
        </form>
    </div>
</div>
</body>
</html>
