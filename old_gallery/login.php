<?php
session_start();

include __DIR__ . '/functions.php';

if (null != getCurrentUser()) {
    header('Location: ' . '/02/');
    exit();
}

$userName = '';
$userPassword = '';

if (isset($_POST['login'])) {
    $userName = $_POST['login'];
}
if (isset($_POST['password'])) {
    $userPassword = $_POST['password'];
}

if (checkPassword($userName, $userPassword)) {
    $_SESSION['user'] = $userName;
    header('Location: ' . '/02/');
    exit();
}
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

    <title>Login</title>
</head>
<body>
<p></p>
<div class="container">
    <form action="/02/login.php" method="post">
        <label>Login: </label><input type="text" name="login"><br>
        <label>Password: </label><input type="password" name="password"><br>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>