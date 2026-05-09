<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
</head>
<body>

<h1>Регистрация</h1>

<form id="registerForm">

    <input type="email" id="email" placeholder="Email" required>
    <br><br>

    <input type="password" id="password" placeholder="Password" required>
    <br><br>

    <button type="submit">Зарегистрироваться</button>

</form>

<p id="message"></p>

<p>
    Уже есть аккаунт?
    <a href="login.php">Войти</a>
</p>

<script src="register.js"></script>

</body>
</html>