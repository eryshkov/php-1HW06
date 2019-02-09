<?php

$myGuestBook = include __DIR__ . '/index.php';

if (isset($_POST['message'])) {
    $myGuestBook->append($_POST['message']);
    $myGuestBook->save();

    header('Location:' . '/01/');
    exit;
} else {
    http_response_code(400);
}



