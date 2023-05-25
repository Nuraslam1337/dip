<?php

    session_start();
    require_once 'connect.php';
    $full_name = trim($_POST['name']);
    $email = $_POST['email'];
    $login = $_POST['login'];
    $number = $_POST['number'];
    $old_password = md5($_POST['old_password']);
    $id = $_SESSION['user']['id'];
    $avatar = $_POST['avatar'];

    if ( $_POST['new_password'] == NULL) 
    { $new_password = $_SESSION['user']['password']; } 
    else 
    { $new_password = md5($_POST['new_password']);}


    $currentAv = $_SESSION['user']['avatar'];
    
    if ($avatar == null)
    {
        $path = $currentAv;
    }
    else
    {
        unlink("../$currentAv");
        $path = 'uploads/' . microtime() . $_FILES['avatar']['name'];
        

        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path))
        {
            $_SESSION['message'] = 'Қате файл';
        }
    }

    if ($old_password == $_SESSION['user']['password'])
    {      
        $query = "UPDATE users SET full_name = '$full_name', login = '$login', email = '$email', number = '$number', password = '$new_password', avatar = '$path' WHERE id = '$id'";
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $num_rows = mysqli_num_rows($result);

        $check_user = mysqli_query($connect, "SELECT * FROM users WHERE id = '$id'");
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "full_name" => $user['full_name'],
            "id" => $user['id'],
            "avatar" => $user['avatar'],
            "email" => $user['email'],
            "login" => $user['login'],
            "number" => $user['number'],
            "type" => $user['type'],
            "bin" => $user['bin'],
            "password" => $user['password']
        ];
        
        if($result)
        {
           $_SESSION['message'] = 'Деректер өзгертілді';
        }
        else{$_SESSION['message'] = 'Деректер өзгертілмеді';} 
        header('Location: ../redact.php');
    }
    else{$_SESSION['message'] = 'Қате құпиясөз'; header('Location: ../redact.php');}
   
?>