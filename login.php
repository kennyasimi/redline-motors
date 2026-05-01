<?php
session_start()
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Redline Motors</title>
</head>
<body>

<h2>Вход</h2>

<form method= "POST" action= "auth.php">
    <input type = "text" name= "login" placeholder= "Логин"><br>
    <input type = "password" name = "password" placeholder = "Пароль"><br>
    <button type = "submit">Войти</button>
</form>

</body>
</html>

