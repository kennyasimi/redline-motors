<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Redline Motors</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<ul>
    <li><a href="index.php">Главная</a></li>
    <li><a href="catalog.php">Каталог</a></li>
</ul>
<button onclick="window.location.href= 'logout.php'">
    Выйти
</button>


<hr>

<h1>Redline Motors</h1>

<p>Добро пожаловать в <b>Redline Motors</b> — дилерский центр спортивных автомобилей.</p>

<p>Мы предлагаем лучшие автомобили для скорости, трека и настоящих эмоций.</p>

<hr>

<p><small>&copy; Все права защищены</small></p>

</body>
</html>
