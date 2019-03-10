<?php
session_start();

include __DIR__ . '/functions.php';
require_once __DIR__ . '/classes/Uploader.php';

if (null === getCurrentUser()) {
    header('Location: ' . '/login.php');
    exit();
}

$userName = getCurrentUser();

$imageUploader = new Uploader('image');
$uploadResult = $imageUploader->uploadImage();

if (true === $uploadResult) {
    writeLog(__DIR__ . '/img/log.txt', $userName, 'image');

    header('Location:' . '/gallery.php');
    exit;
} else {
    ?>Не удалось сохранить этот файл на сервере<?php
}