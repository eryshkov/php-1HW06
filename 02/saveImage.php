<?php
session_start();

include __DIR__ . '/functions.php';
include __DIR__ . '/Uploader.php';

if (null === getCurrentUser()) {
    header('Location: ' . '/02/login.php');
    exit();
}

$userName = getCurrentUser();

$imageUploader = new Uploader('image');
$uploadResult = $imageUploader->upload();

$isSuccess = $uploadResult['success'];
$isImage = $uploadResult['isImage'];

if (true === $isSuccess) {
    header('Location:' . '/02/');
    exit;
} elseif (false === $isImage) {
    ?>Загружаемый файл не является изображением<?php
} else {
    ?>Не удалось сохранить файл на сервере<?php
}