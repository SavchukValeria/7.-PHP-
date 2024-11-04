<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $_SESSION['username'] = $username;
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Авторизація</title>
</head>
<body>
    <h1>Увійти</h1>
    <form action="" method="post">
        <label for="username">Ім'я користувача:</label>
        <input type="text" name="username" required>
        <input type="submit" value="Увійти">
    </form>
    <a href="index.php">Назад до продуктів</a>
</body>
</html>