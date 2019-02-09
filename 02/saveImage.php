<?php
session_start();

include __DIR__ . '/functions.php';
include __DIR__ . '/Uploader.php';

if (null == getCurrentUser()) {
    header('Location: ' . '/02/login.php');
    exit();
}

$userName = getCurrentUser();

$isSuccess = false;

$imageUploader = new Uploader('image');
$isSuccess = $imageUploader->upload();

if ($isSuccess) {
    header('Location:' . '/02/');
    exit;
} else {
    ?>Не удалось сохранить файл на сервере<?php
}