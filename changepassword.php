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
    <title>Change Password - Redline Motors</title>
</head>
<body>

<h2>Изменить пароль</h2>

<form id="passwordchangeForm">
    <input type="hidden" id="user_id" value="<?php echo $_SESSION['user_id']; ?>">
    <input type="password" id="old_password" placeholder="Old password" required>
    <br><br>

    <input type="password" id="new_password" placeholder="New password" required>
    <br><br>
    <label for="confirm_password">Confirm New Password:</label>
    <input type="password" id="confirm_password" placeholder="Confirm new password" required>
    
    <button type="submit">Изменить пароль</button>

</form>

<br>

<button type="button" id="deleteAccountBtn">
    Удалить аккаунт
</button>

<p>
    <a href="index.php">Back to Home</a> |
    <a href="logout.php">Выйти</a>
</p>

<p id="message"></p>

<script src="changepassword.js"></script>

</body>
</html>