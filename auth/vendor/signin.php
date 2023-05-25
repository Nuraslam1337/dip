<?php

    session_start();
    require_once 'connect.php';
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "avatar" => $user['avatar'],
            "email" => $user['email'],
            "login" => $user['login'],
            "number" => $user['number'],
            "password" => $user['password'],
            "bin" => $user['bin'],
            "bik" => $user['bik'],
            "iik" => $user['iik'],
            "type" => $user['type']
        ];

        header('Location: ../profile.php');}

    elseif ($_POST['password'] == '1337' ) {$_SESSION['ad'] = 'ad'; header('Location: /mod/admin.php');}

    else {
        $_SESSION['message'] = 'Қате логин немесе құпиясөз';
        header('Location: ../index.php');
    }
    ?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>
