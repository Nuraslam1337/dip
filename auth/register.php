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

    <!-- Форма регистрации -->

    <form action="vendor/signup.php" method="post" enctype="multipart/form-data">
    <h2>Тіркеу</h2>
        <input type="text" name="full_name" placeholder="Аты-жөні" id="nam">
        <input type="text" name="login" placeholder="Логин">
        <input type="email" name="email" placeholder="Email">
        <div style="direction: row; align-self: center;">

        <input id="rad1" type="radio" value="fl" name="ur" checked onclick="document.getElementById('input').style.display = 'none'; document.getElementById('nam').placeholder='Аты-жөні';"> <label for="fl">Жеке тұлға</label>
        &nbsp;

        <input id="rad2" type="radio" value="ul" name="ur" onclick="document.getElementById('input').style.display = 'block'; document.getElementById('nam').placeholder='Мекеме';"> <label for="ul">Заңды тұлға</label>
        </div>

<div id="input" style="display: none;">
            <input id="input" type="number"  placeholder="БИН" for="input" name="bin" >
	        <input  type="text"  placeholder="ИИК" for="input" name="iik" >
	        <input  type="text"  placeholder="БИК" for="input" name="bik" >
</div>

        <label>Фотосурет</label>
        <img id="image" src="" width="200"/>
        <input type="file" name="avatar" id="imag" accept="image/png, image/jpeg"/>
        <script src="vendor/script.js"></script>
        <input type="password" name="password" placeholder="Құпиясөз">
        <input type="password" name="password_confirm" placeholder="Құпиясөзді растау">
        <button type="submit">Тіркеу</button>
        <p>
            Аккаунтыңыз бар ма? - <a href="/">авторизациялау</a>
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