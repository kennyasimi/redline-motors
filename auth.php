<?php
session_start();
require 'users.php';

$login = trim($_POST['login']);
$password = trim($_POST['password']);

$dir = __DIR__ . '/logs';
$file = $dir . '/authlogs.log';

$time = date('Y-m-d H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];

if(!isset($users[$login])) {
    $line = "$time | ip=$ip | login=$login | action=FAIL_LOGIN";
    file_put_contents($file, $line . PHP_EOL, FILE_APPEND);

    echo "Пользователь не найден";
    exit;
}
$user = $users[$login];
if (password_verify($password, $user['password_hash'])) {
    $_SESSION['user_id'] = $user['id'];

    $line = "$time | ip=$ip | login=$login | action=SUCCESS_LOGIN";
    file_put_contents($file, $line . PHP_EOL, FILE_APPEND);

    header("Location: index.php");
    exit;
} else{
    $line = "$time | ip=$ip | login=$login | action=FAIL_LOGIN";
    file_put_contents($file, $line . PHP_EOL, FILE_APPEND);

    echo "Неверный пароль";
}