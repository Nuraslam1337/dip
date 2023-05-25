<?php

    session_start();
    require_once 'connect.php';
    $prof = trim($_POST['prof']);
    $sal = intval($_POST['sal']);
    $adres = $_POST['adres'];
    $number = intval($_POST['number']);
    $des = $_POST['des'];
    $opt = trim($_POST['opt']);
    $email = $_POST['email'];
    $educ = $_POST['educ'];
    $zan = $_POST['zan'];

    
    $name = $_SESSION['user']['full_name'];
    $id = $_SESSION['user']['id'];
    $query = "INSERT INTO res (user_id, name, sal, des, number, adres, prof, opt, email, educ, zan) VALUES ('$id', '$name', '$sal', '$des', '$number', '$adres', '$prof', '$opt', '$email', '$educ', '$zan')";
    mysqli_query($connect, $query) or die(mysqli_error($connect));

    $_SESSION['message'] = 'Түйіндеме ашық';
    header('Location: ../addres.php');
   
?>