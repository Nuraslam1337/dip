<?php

    session_start();
    require_once 'connect.php';
    $jname = trim($_POST['jname']);
    $adrs = $_POST['adrs'];
    $salary = $_POST['salary'];
    $number = $_POST['number'];
    $dscrptn = trim($_POST['dscrptn']);
    $educ = $_POST['educ'];
    $zan = $_POST['zan'];
    $graf = $_POST['graf'];
    
    $id = $_SESSION['user']['id'];
    $query = "INSERT INTO vac (user_id, id, jname, salary, dscrptn, number, adrs, educ, zan, graf) VALUES ('$id', NULL, '$jname', '$salary', '$dscrptn', '$number', '$adrs', '$educ', '$zan', '$graf')";
    mysqli_query($connect, $query) or die(mysqli_error($connect));

    $_SESSION['message'] = 'Вакансия ашық';
    header('Location: ../addvac.php');
   
?>