<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <title>Профиль өзгерту</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body class="body2">

    <!-- Профиль -->

    <form action="vendor/edit.php" method="post" enctype="multipart/form-data">
        <label>Фотосурет</label>

        <img id="image" src="<?= $_SESSION['user']['avatar'] ?>" width="200"/>
        <input type="file" name="avatar" id="imag" accept="image/png, image/jpeg"/>
        <script src="vendor/script.js"></script>

        <label>Аты-жөні:</label>
        <input type="text" name="name" value="<?= $_SESSION['user']['full_name'] ?>">

        <label>Email:</label>
        <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>">

        </br>
        <label>Логин:</label>
        <input type="text" name="login" value="<?= $_SESSION['user']['login'] ?>">
        </br>
        <label>Нөмір:</label>
        <input type="tel" name="number" value="<?= $_SESSION['user']['number'] ?>">
        </br>
        <input type="password" name="old_password" placeholder="Құпиясөз">
        <input type="password" name="new_password" placeholder="Жаңа құпиясөз">
        
        <button type="submit">Өзгерту</button>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
        </br>
        <hr>
        </br>
        <a href="profile.php">Артқа</a>
    </form>

</body>
</html>