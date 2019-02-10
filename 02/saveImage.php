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

$isSuccess = $uploadResult['success'];
$isImage = $uploadResult['isImage'];
$imageName = $uploadResult['imageName'];

if (true === $isSuccess) {
    writeLog(__DIR__ . '/img/log.txt', $userName, $imageName);

    header('Location:' . '/02/');
    exit;
} elseif (false === $isImage) {
    ?>Загружаемый файл не является изображением<?php
} else {
    ?>Не удалось сохранить файл на сервере<?php
}