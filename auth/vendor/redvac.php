<?php

    session_start();
    require_once 'connect.php';
    $jname = trim($_POST['jname']);
    $salary = trim($_POST['salary']);
    $adrs = $_POST['adrs'];
    $number = $_POST['number'];
    $dscrptn = trim($_POST['dscrptn']);
    $educ = $_POST['educ'];
    $zan = $_POST['zan'];
    $graf = $_POST['graf'];

    $id = $_POST['id'];
         
        $query = "UPDATE vac SET jname = '$jname', salary = '$salary', adrs = '$adrs', number = '$number', dscrptn = '$dscrptn', educ = '$educ', zan = '$zan', graf = '$graf' WHERE id = '$id'";
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $num_rows = mysqli_num_rows($result);        
        
        if($result)
        {
           $_SESSION['message'] = 'Деректер өзгертілді';
        }
        else{$_SESSION['message'] = 'Деректер өзгертілмеді';} 
        
        header('Location: ../editvac.php');
   
?>