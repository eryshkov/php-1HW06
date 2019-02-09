<?php

$myGuestBook = include __DIR__ . '/index.php';

if (isset($_POST['message'])) {
    //Применил возврат $this из метода, что дает возможность сразу вызвать следующий метод
    $myGuestBook->append($_POST['message'])->save();

    header('Location:' . '/01/');
    exit;
} else {
    http_response_code(400);
}



