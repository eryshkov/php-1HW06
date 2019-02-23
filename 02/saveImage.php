<?php
session_start();

include __DIR__ . '/functions.php';
require_once __DIR__ . '/Uploader.php';

if (null === getCurrentUser()) {
    header('Location: ' . '/02/login.php');
    exit();
}

$userName = getCurrentUser();

$imageUploader = new Uploader('image');
$uploadResult = $imageUploader->upload();

if (true === $uploadResult) {
    writeLog(__DIR__ . '/img/log.txt', $userName, $imageName);

    header('Location:' . '/02/');
    exit;
} else {
    ?>Не удалось сохранить этот файл на сервере<?php
}