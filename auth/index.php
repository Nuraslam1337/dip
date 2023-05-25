<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизациялау және тіркеу</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body class="body1">

<!-- Форма авторизации -->

    <form action="vendor/signin.php" method="post">
        <h2>Авторизация</h2>
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Құпиясөз">
        <button type="submit">Кіру</button>
        <p>
            Аккаунтыңыз жоқ па? - <a href="/register.php">тіркелу</a>
        </p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>