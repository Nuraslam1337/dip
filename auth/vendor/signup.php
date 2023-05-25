<?php
    session_start();
    require_once 'connect.php';

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ur = $_POST['ur'];
    $bin = intval($_POST['bin']);
    $iik = $_POST['iik'];
    $bik = $_POST['bik'];
    $password_confirm = md5($_POST['password_confirm']);

    $check_user = mysqli_query($connect, "SELECT * FROM users WHERE email = $email");
    if ($password == NULL)
    {
        $_SESSION['message'] = "Введите email";
        header('Location: ../register.php');
    }
    elseif (mysqli_num_rows($check_user) < 1) 
    {
        if (mb_strlen($password, 'utf-8') > 7)
        {
            $password = md5($password);
            if ($password === $password_confirm OR $login !== NULL) 
            {
                $path = 'uploads/' . time() . $_FILES['avatar']['name'];
                if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) 
                {
                    $path='uploads/amog.jfif';
                }
                mysqli_query($connect, "INSERT INTO `users` (`full_name`, `login`, `email`, `password`, `avatar`, `type`, `bin`, `iik`, `bik`) VALUES ('$full_name', '$login', '$email', '$password', '$path', '$ur', '$bin', '$iik', '$bik')") or die(mysqli_error($connect));
                $_SESSION['message'] = 'Сіз тіркелдіңіз!';
                header('Location: ../index.php');
            } 
            else
            {
                $_SESSION['message'] = 'Қате құпиясөз немесе логин';
                header('Location: ../register.php');
            }
        }
        else
        {
            $_SESSION['message'] = '8 таңбадан кем емес құпиясөз ойлап табыңыз';
                header('Location: ../register.php');
        }
    }
    else 
    {
        $_SESSION['message'] = "$email бұрыннан тіркелген";
        header('Location: ../register.php');
    }
?>
