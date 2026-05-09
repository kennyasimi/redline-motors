<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Redline Motors</title>
</head>
<body>

<h2>Вход</h2>

<form id="loginForm">

    <input type="email" id="email" placeholder="Email" required>
    <br><br>

    <input type="password" id="password" placeholder="Password" required>
    <br><br>

    <button type="submit">Войти</button>

</form>
<p>
    Нет аккаунта?
    <a href="register.php">Регистрация</a>
</p>

<p id="message"></p>

<script src="login.js"></script>

</body>
</html>
