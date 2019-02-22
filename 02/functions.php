<?php

function getUsersList()
{
    $users = include __DIR__ . '/users.php';
    return $users;
}

assert(false !== (bool)getUsersList());

function existsUser($login): bool
{
    $users = getUsersList();
    return isset($users[$login]);
}

assert(true === existsUser('eug'));
assert(true === existsUser('tmp'));
assert(true === existsUser('admin'));
assert(false === existsUser('none'));

function checkPassword($login, $password): bool
{
    if (existsUser($login)) {
        $users = getUsersList();
        return password_verify($password, $users[$login]);
    }

    return false;
}

assert(true === checkPassword('eug', '123'));
assert(true === checkPassword('tmp', 'qwerty'));
assert(true === checkPassword('admin', 'iphone'));
assert(false === checkPassword('none', 'test'));
assert(false === checkPassword('admin', 'test3'));
assert(false === checkPassword('none2', ''));

function getCurrentUser()
{
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if (existsUser($user)) {
            return $user;
        }
    }

    return null;
}

function writeLog($fileName, $userName, $imageName)
{
    $date = date(DATE_ATOM);
    $logString = [$date, $userName, 'save image', $imageName];
    file_put_contents($fileName, implode(' | ', $logString) . PHP_EOL, FILE_APPEND);
}