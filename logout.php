<?php
session_start();

$dir = __DIR__ . '/logs';
$file = $dir . '/authlogs.log';

$time = date('Y-m-d H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];

$line = "$time | ip=$ip | action+LOGOUT";
file_put_contents($file, $line . PHP_EOL, FILE_APPEND);

session_destroy();

header("Location: login.php");
exit;
